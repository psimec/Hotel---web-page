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

include_once './klase//dnevnik.php';
include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();

//dodati uredivanje rezervacija


$slanje = $_SERVER['PHP_SELF'];
$sobe = "";
$korisnici = "";
$greska = "";
$uspjeh = "";
$ispisGreska = "";
$ispisUspjeha = "";

$korisnicko_ime = $_SESSION["korime"];
$idKorisnik = $_SESSION["id"];

$sql = "SELECT korisnicko_ime, idkorisnik FROM korisnik where idtip_korisnika = 1;"; // samo registrirani korisnici
$rs = $baza->selectDB($sql);

$korisnici .= "<option>== Odaberi korisnika ==</option>\n";
while (list($korime, $id) = $rs->fetch_array()) {
    $korisnici .= "<option value='$id'>$korime</option>\n";
}

$sql = "select soba.idsoba, soba.opis, hotel.naziv from hotel, moderator_hotela, korisnik, tip_korisnika, soba where 
        tip_korisnika.idtip_korisnika = korisnik.idtip_korisnika and korisnik.idkorisnik = moderator_hotela.idkorisnik and hotel.idhotel = moderator_hotela.idhotel and hotel.idhotel = soba.idhotel and
        korisnik.idkorisnik = $idKorisnik and  tip_korisnika.idtip_korisnika = 2;"; // sobe hotela za koje je zadužen taj moderator
$rs = $baza->selectDB($sql);

$sobe .= "<option>== Odaberi sobu ==</option>\n";
while (list($idsoba, $opis, $nazivHotela) = $rs->fetch_array()) {
    $sobe .= "<option value='$idsoba'>Broj: $idsoba => $opis, $nazivHotela</option>\n";
}

if (isset($_POST["datum"])) { // ako je forma poslana
    $datum = $_POST["datum"];
    $vrijeme = $_POST["vrijeme"];
    $trajanje = $_POST["trajanje"];
    $odabranaSoba = $_POST["broj_sobe"];
    $odabraniKorisnik = $_POST["korisnik"];
    $datumVrijeme = date('Y-m-d H:i:s', strtotime("$datum $vrijeme")); // spaja datum i vrijeme i datetime

    $sql = "INSERT INTO rezervacija VALUES (null, '$datumVrijeme', $trajanje, $odabraniKorisnik, $odabranaSoba);";
    if ($baza->updateDB($sql)) { // upis podataka u bazu
        $uspjeh .= 'Podaci su upisani<br/><br/>';
        dnevnik::insert($korisnicko_ime, $sql, 1);
    } else {
        $greska .= 'Doslo je do greške<br/><br/>';
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
$smarty->assign('korisnik', $korisnik);
$smarty->assign('moderator', $moderator);
$smarty->assign('pozdravKorisniku', $korisnicko_ime);
$smarty->assign('naslov', "Rezervacije sobe");
$smarty->assign('slanje', $slanje);
$smarty->assign('sobe', $sobe);
$smarty->assign('greska', $ispisGreska);
$smarty->assign('uspjeh', $ispisUspjeha);
$smarty->assign('korisnici', $korisnici);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/rezervacijeSobe.tpl');
$smarty->display('predlosci/footer.tpl');
?>