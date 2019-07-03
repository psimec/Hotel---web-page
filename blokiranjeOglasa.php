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

include_once './klase//dnevnik.php';
include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();

$korime = $_SESSION["korime"];

$sql = "select naziv from oglas where status = 'prihvacen';";
$rs = $baza->selectDB($sql);
$naziviOglasa = "";
$greska = "";
$uspjeh = "";
$ispisGreska = "";
$ispisUspjeha = "";

$naziviOglasa .= "<option>== Odaberi naziv oglasa ==</option>\n";
while (list($naziv) = $rs->fetch_array()) {
    $naziviOglasa .= "<option>$naziv</option>\n";
}

$poruka = "";
if (isset($_POST["opis"])) { // ako korisnik salje zahtjev za blokiranjem
    $opis = $_POST["opis"];
    $imeOglasa = $_POST["ime_oglasa"];
    $idkorisnik = $_COOKIE["id_korisnika"];
    $upit = "select idoglas from oglas where naziv ='$imeOglasa'";
    $rs = $baza->selectDB($upit);
    $podaci = $rs->fetch_array();
    $idOglas = $podaci["idoglas"];

    $upit = "INSERT INTO zahtjev_za_blokiranje VALUES (null, '" . $opis . "', default, default," . $idkorisnik . ", " . $idOglas . ")";
    if ($baza->updateDB($upit)) {
        $uspjeh .= "Zahtjev je poslan!";
        dnevnik::insert($korime, $upit, 1);
    } else {
        $greska .= "Greska kod slanja zatjeva!";
        dnevnik::insert($korime, $upit, 0);
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
$smarty->assign('naslov', "Blokiranje oglasa");
$smarty->assign('korisnik', $korisnik);
$smarty->assign('pozdravKorisniku', $korime);
$smarty->assign('moderator', $moderator);
$smarty->assign('slanje', $slanje);
$smarty->assign('greska', $ispisGreska);
$smarty->assign('uspjeh', $ispisUspjeha);
$smarty->assign('poruka', $poruka); // slanje poruke za zathtjev
$smarty->assign('naziviOglasa', $naziviOglasa);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/blokiranjeOglasa.tpl');
$smarty->display('predlosci/footer.tpl');
?>