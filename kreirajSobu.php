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

$sql = "select hotel.naziv, hotel.idhotel from hotel, moderator_hotela, korisnik, tip_korisnika where 
tip_korisnika.idtip_korisnika = korisnik.idtip_korisnika and korisnik.idkorisnik = moderator_hotela.idkorisnik and hotel.idhotel = moderator_hotela.idhotel and
korisnik.idkorisnik =" . $idKorisnik . " and  tip_korisnika.idtip_korisnika = 2;";
$rs = $baza->selectDB($sql);
$hoteli = "";
$greska = "";
$uspjeh = "";
$ispisGreska = "";
$ispisUspjeha = "";
$listaHotela = array();

while (list($nazivHotela, $id) = $rs->fetch_array()) { // dohvati vrste oglasa za selecet dio  
    $hoteli .= "<option>$nazivHotela</option>\n";
    $listaHotela[$nazivHotela] = $id;
}

if (isset($_POST["hotel"])) {
    $uzorak = '/^.+\.[jp][pn]g$/'; //provjerava je li je slika u dobrom formatu
    $datoteka = $_FILES['userfile']['name'];
    if (!preg_match($uzorak, $datoteka)) {
        $greska .= "Slika nije u odgovarajucem formatu" . "<br/>";
    } else { // ako je dobar format, salji podatke u bazu i sliku na server
        $userfile = $_FILES['userfile']['tmp_name'];
        $userfile_name = $_FILES['userfile']['name'];
        $userfile_size = $_FILES['userfile']['size'];
        $userfile_type = $_FILES['userfile']['type'];
        $upfile = "./slike/sobe/" . $userfile_name;

        if (is_uploaded_file($userfile)) {
            if (!move_uploaded_file($userfile, $upfile)) {
                $greska .= 'Problem: nije moguće prenijeti datoteku na odredište';     
            }
        } else {
            $greska .= 'Problem: mogući napad prijenosom. Datoteka: ' . $userfile_name;
            $greska .= "Not uploaded because of error #".$_FILES["userfile"]["error"];
        }

        $hotel = $_POST["hotel"];
        $idhotel = $listaHotela[$hotel];
        $brojLezaja = $_POST["broj_lezaja"];
        $opis = $_POST["velicina_sobe"];

        $sql = "insert into soba values (null,'$brojLezaja', '$opis', default,'$datoteka', $idhotel);";
        if ($baza->updateDB($sql)) { // upis podataka u bazu
            $uspjeh .= 'Datoteka uspješno prenesena, podaci su upisani<br/><br/>';
            dnevnik::insert($korime, $sql, 1);
        } else {
            $greska .= 'Doslo je do greske<br/><br/>';
            dnevnik::insert($korime, $sql, 0);
        }
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
$smarty->assign('naslov', "Kreiraj sobu");
$smarty->assign('greska', $ispisGreska);
$smarty->assign('uspjeh', $ispisUspjeha);
$smarty->assign('hoteli', $hoteli);
$smarty->assign('slanje', $slanje);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/kreirajSobu.tpl');
$smarty->display('predlosci/footer.tpl');
?>