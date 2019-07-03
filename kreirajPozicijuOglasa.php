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

include_once './klase//dnevnik.php';
include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();
$moderatori = "";
$greska = "";
$uspjeh = "";
$ispisGreska = "";
$ispisUspjeha = "";

$idKorisnik = $_SESSION["id"];
$korisnicko_ime = $_SESSION["korime"];

$sql = "SELECT korisnicko_ime, idkorisnik FROM korisnik WHERE idtip_korisnika = 2;";
$rs = $baza->selectDB($sql);

$moderatori .= '<option>== Odaberi moderatora ==</option>\n';
while (list($korime, $id) = $rs->fetch_array()) { // dohvati sve moderatore
    $moderatori .= "<option value='$id'>$korime</option>\n";
}

if (isset($_POST["visina"])) {
    $odabraniModerator = $_POST["moderator"];
    $stranica = $_POST["stranica"];
    $lokacija = $_POST["lokacija"];
    $visina = $_POST["visina"];
    $sirina = $_POST["sirina"];

    $sql = "INSERT INTO pozicija_oglasa VALUES (null, '$stranica', $lokacija, $visina, $sirina, $odabraniModerator);";
    if ($baza->updateDB($sql)) { // upis podataka u bazu
        $uspjeh .= 'Podaci su upisani<br/><br/>';
        dnevnik::insert($korisnicko_ime, $sql, 1);
    } else {
        $greska .= 'Doslo je do greske<br/><br/>';
        dnevnik::insert($korisnicko_ime, $sql, 0);
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
$smarty->assign('slanje', $slanje);
$smarty->assign('greska', $ispisGreska);
$smarty->assign('uspjeh', $ispisUspjeha);
$smarty->assign('moderatori', $moderatori);
$smarty->assign('naslov', "Kreiraj poziciju oglasa");
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/kreirajPozicijuOglasa.tpl');
$smarty->display('predlosci/footer.tpl');
?>