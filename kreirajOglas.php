<?PHP

$korisnik = "";
$moderator = "";
session_start();
if (!isset($_SESSION["korime"]) || !isset($_SESSION["tip"])) {
    header("Location: ./okviri/error.php?e=2");
    exit();
}
if ($_SESSION["tip"] == 1) {
    $korisnik = 'hidden';
}
if ($_SESSION["tip"] == 2) {
    $moderator = 'hidden';
}

$slanje = $_SERVER['PHP_SELF'];

include_once './klase//baza.class.php';
include_once './klase//dnevnik.php';
$baza = new Baza();
$baza->spojiDB();

$idKorisnik = $_SESSION["id"];
$korime = $_SESSION["korime"];


$vrste = "";
$sql = "SELECT vrsta_oglasa.idvrsta_oglasa, vrsta_oglasa.trajanje_prikazivanja, vrsta_oglasa.brzina_izmjene,"
        . "vrsta_oglasa.cijena, pozicija_oglasa.stranica, pozicija_oglasa.broj_lokacije FROM vrsta_oglasa, pozicija_oglasa WHERE vrsta_oglasa.idpozicija_oglasa = pozicija_oglasa.idpozicija_oglasa ORDER BY 5;";
$rs = $baza->selectDB($sql);
$greska = "";
$uspjeh = "";
$ispisGreska = "";
$ispisUspjeha = "";

while (list($id, $trajanje, $brzina, $cijena, $stranica, $lokacija) = $rs->fetch_array()) { // dohvati vrste oglasa za selecet dio
    $vrste .= "<option value='$id'>Stranica: $stranica, $lokacija, trajanje $trajanje dana, brzina $brzina sec, cijena $cijena kn</option>\n";
}

//varijable za stavljanje vrijednosti textboxova
$postaviImeSlike = "";
$postaviOpis = "";
$postaviUrl = "";
$postaviVrstaOglasa = "";
$postaviNaziv = "";

if (isset($_POST["opis"])) { //ako je forma poslana, unos podataka u bazu
    $uzorak = '/^.+\.[jp][pn]g$/'; //provjerava je li je slika u dobrom formatu
    $datoteka = $_FILES['userfile']['name'];
    if (!preg_match($uzorak, $datoteka)) {
        $greska .= "Slika nije u odgovarajucem formatu" . "<br/>";
    } else { // ako je dobar format, salji podatke u bazu i sliku na server
        $userfile = $_FILES['userfile']['tmp_name'];
        $userfile_name = $_FILES['userfile']['name'];
        $userfile_size = $_FILES['userfile']['size'];
        $userfile_type = $_FILES['userfile']['type'];
        $upfile = "./slike/oglasi/" . $userfile_name;

        $vrstaOglasa = $_POST["vrsta_oglasa"];
        $opis = $_POST["opis"];
        $naziv = $_POST["naziv"];
        $url = $_POST["url"];
        $vrijeme = $_POST["vrijeme"];
        $datum = $_POST["datum"];
        $datumVrijeme = date('Y-m-d H:i:s', strtotime("$datum $vrijeme"));

        if (is_uploaded_file($userfile)) {
            if (!move_uploaded_file($userfile, $upfile)) {
                $greska .= 'Problem: nije moguće prenijeti datoteku na odredište';
            }
        } else {
            $greska .= 'Problem: mogući napad prijenosom. Datoteka: ' . $userfile_name;
        }
        // dodati dio za trajanje oglasa, opis u uputama!        
    }
}

if (isset($_GET["idoglas"])) { // ako se na starnicu dode preko moji oglasi, mod za uredivanje
    $provjera = TRUE;
    $idOglas = $_GET["idoglas"];
    $sql = "SELECT naziv, opis, putanja_do_slike, url, idvrsta_oglasa  FROM oglas where idoglas=" . $idOglas . ";";
    $rs = $baza->selectDB($sql);
    while (list($naziv, $opis, $putanja_slike, $url, $vrstaOglasa) = $rs->fetch_array()) { // dohvati podate o oglasu i stavi vrijednosti u textboxove
        $postaviImeSlike = $putanja_slike;
        $postaviOpis = $opis;
        $postaviUrl = $url;
        $postaviVrstaOglasa = $vrstaOglasa;
        $postaviNaziv = $naziv;
    }
    $sql = "DELETE FROM oglas WHERE idoglas=" . $idOglas . ";";
    $baza->updateDB($sql);
}

if (isset($_POST["opis"])) {
    $vrstaOglasa = $_POST["vrsta_oglasa"];
    $opis = $_POST["opis"];
    $naziv = $_POST["naziv"];
    $url = $_POST["url"];
    $vrijeme = $_POST["vrijeme"];
    $datum = $_POST["datum"];
    $datumVrijeme = date('Y-m-d H:i:s', strtotime("$datum $vrijeme")); // spaja datum i vrijeme i datetime
    $sql = "insert into oglas values (null,'$naziv', '$opis','$url', '$datumVrijeme', null, '$datoteka','$idKorisnik','$vrstaOglasa')";
    if ($baza->updateDB($sql)) { // upis podataka u bazu
        $uspjeh .= 'Datoteka uspješno prenesena, podaci su upisani<br/><br/>';
    }
    dnevnik::insert($korime, $sql, 1);
}

if ($greska != "") {
    $ispisGreska = "<div class='isa_error'>$greska</div>";
}

if ($uspjeh != "") {
    $ispisUspjeha = "<div class='isa_success'>$uspjeh</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('naslov', "Kreiraj oglas");
$smarty->assign('pozdravKorisniku', $korime);
$smarty->assign('korisnik', $korisnik);
$smarty->assign('moderator', $moderator);
$smarty->assign('greska', $ispisGreska);
$smarty->assign('uspjeh', $ispisUspjeha);
$smarty->assign('slanje', $slanje);
$smarty->assign('vrste', $vrste);

//varijable za stavljanje vrijednosti textboxova
$smarty->assign('postaviImeSlike', $postaviImeSlike);
$smarty->assign('postaviOpis', $postaviOpis);
$smarty->assign('postaviUrl', $postaviUrl);
$smarty->assign('postaviVrstaOglasa', $postaviVrstaOglasa);
$smarty->assign('postaviNaziv', $postaviNaziv);


$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/kreirajOglas.tpl');
$smarty->display('predlosci/footer.tpl');
?>