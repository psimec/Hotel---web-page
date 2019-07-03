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

$ispisPotvrda = "";
$potvrda = "";

include_once './klase//dnevnik.php';
include_once './klase//baza.class.php';
include_once './klase//korisnik.php';
$baza = new Baza();
$baza->spojiDB();

if (isset($_POST["korime"])) { //provjere   
    $korisnik = new Korisnik();
    $korisnik->set_podaci($_POST["korime"], $_POST["ime"], $_POST["prezime"], $_POST["lozinka"], $_POST["ulica"], $_POST["grad"], $_POST["drzava"], $_POST["email"]);
    $korisnik->set_status("normalan");
    $korisnik->set_tipkorisnika(2);
    $korisnik->upisi_korisnika();
    dnevnik::registracija($korisnicko_ime, 1);
    $potvrda .= "Registracija uspjesna";
}

if ($potvrda != "") {
    $ispisPotvrda = "<div class='isa_info'>$potvrda</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik',"");
$smarty->assign('moderator',"");
$smarty->assign('pozdravKorisniku',$korisnicko_ime);
$smarty->assign('slanje', $slanje);
$smarty->assign('naslov', "Kreiraj moderatora");
$smarty->assign('ispisPotvrda', $ispisPotvrda);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/kreirajModeratora.tpl');
$smarty->display('predlosci/footer.tpl');
?>