<?PHP
$korisnik = "";
$moderator = "";

session_start();
if (!isset($_SESSION["korime"]) || !isset($_SESSION["tip"])) {
    header("Location: ./okviri/error.php?e=2");
    exit();
} else if ($_SESSION["tip"] < 2) {
    header("Location: ./okviri/error.php?e=2");
    exit();
}

if ($_SESSION["tip"] == 2) {
    $moderator = "hidden";
}

$slanje = $_SERVER['PHP_SELF'];

include_once './klase//dnevnik.php';
include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();

$idKorisnik = $_SESSION["id"];
$korime = $_SESSION["korime"];

$greska = "";
$uspjeh = "";
$ispisGreska = "";
$ispisUspjeha = "";
$pozicije = "";

$sql = "select pozicija_oglasa.stranica, pozicija_oglasa.broj_lokacije, pozicija_oglasa.idpozicija_oglasa"
        . " from pozicija_oglasa left join vrsta_oglasa on pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa"
        . " where pozicija_oglasa.idkorisnik = $idKorisnik"; // dohvaca pozicije samo one za koje je aktivni moderator zaduzen

$rs = $baza->selectDB($sql);

$pozicije .= "<option>== Odaberi poziciju ==</option>\n";
while (list($stranica, $brojLokacije, $idPozicije) = $rs->fetch_array()) {
    $pozicije .= "<option value='$idPozicije'>Stranica: $stranica ,lokacija: $brojLokacije</option>\n";
}

if (isset($_POST["trajanje"])) { // ako je forma poslana
    $trajanje = $_POST["trajanje"];
    $idPozicije = $_POST["id_pozicija"];
    $brzina = $_POST["brzina_izmjene"];
    $cijena = $_POST["cijena"];

    $sql = "INSERT INTO vrsta_oglasa VALUES (null, '$trajanje', $brzina, $cijena, $idPozicije);";
    if ($baza->updateDB($sql)) { // upis podataka u bazu
        $uspjeh .= 'Podaci su upisani<br/><br/>';
        dnevnik::insert($korime, $sql, 1);
    }else{
        $greska .= 'Doslo je do greske<br/><br/>';
        dnevnik::insert($korime, $sql, 0);
    }
}

if ($greska != "") {
    $ispisGreska = "<div class='isa_error'>$greska</div>";
}

if ($uspjeh != "") {
    $ispisUspjeha = "<div class='isa_success'>$uspjeh</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik', $korisnik);
$smarty->assign('pozdravKorisniku', $korime);
$smarty->assign('moderator', $moderator);
$smarty->assign('slanje', $slanje);
$smarty->assign('greska', $ispisGreska);
$smarty->assign('uspjeh', $ispisUspjeha);
$smarty->assign('pozicije', $pozicije);
$smarty->assign('naslov', "Kreiraj vrstu oglasa");
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/kreirajVrstuOglasa.tpl');
$smarty->display('predlosci/footer.tpl');
?>