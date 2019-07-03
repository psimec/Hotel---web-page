<?PHP

session_start();
if (!isset($_SESSION["korime"]) || !isset($_SESSION["tip"])) {
    header("Location: ./okviri/error.php?e=2");
    exit();
} else if (!($_SESSION["tip"] == 3)) {
    header("Location: ./okviri/error.php?e=2");
    exit();
}

$slanje = $_SERVER['PHP_SELF'];
$korisnicko_ime = $_SESSION["korime"];

include_once './klase//dnevnik.php';
include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();
$greska = "";
$uspjeh = "";
$ispisGreska = "";
$ispisUspjeha = "";

$podaci = "";
$sql = "SELECT * FROM pozicija_oglasa ORDER BY 2, 3;";
$rs = $baza->selectDB($sql);

while (list($id, $stranica, $lokacija) = $rs->fetch_array()) { // dohvati vrste oglasa za selecet dio
    $podaci .= "<option value='$id'>Stranica: $stranica, $lokacija</option>\n";
}

if (isset($_POST["visina"]) && isset($_POST["sirina"])) {
    $idPOzicijaOglasa = $_POST["podaci"];
    $visina = $_POST["visina"];
    $sirina = $_POST["sirina"];

    $sql = "UPDATE pozicija_oglasa SET visina = $visina, sirina = $sirina WHERE idpozicija_oglasa = $idPOzicijaOglasa";
    if ($baza->updateDB($sql)) {
        $uspjeh = "Podaci izmjenjeni!";
        dnevnik::update($korisnicko_ime, $sql, 1);
    } else {
        $greska = "Doslo je do greske";
        dnevnik::update($korisnicko_ime, $sql, 0);
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
$smarty->assign('korisnik',"");
$smarty->assign('moderator',"");
$smarty->assign('pozdravKorisniku',$korisnicko_ime);
$smarty->assign('naslov', "Uredivanje oglasa");
$smarty->assign('slanje', $slanje);
$smarty->assign('podaci', $podaci);
$smarty->assign('greska', $ispisGreska);
$smarty->assign('uspjeh', $ispisUspjeha);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/urediPozicijuOglasa.tpl');
$smarty->display('predlosci/footer.tpl');
?>
