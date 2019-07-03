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

include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();

$idKorisnik = $_SESSION["id"];
$korime = $_SESSION["korime"];
$mojiHoteli = "";

$sql = "select hotel.naziv, hotel.putanja_do_slike, hotel.idhotel, hotel.ulica, hotel.email, hotel.broj_zvjezdica from hotel, moderator_hotela, korisnik, tip_korisnika where 
tip_korisnika.idtip_korisnika = korisnik.idtip_korisnika and korisnik.idkorisnik = moderator_hotela.idkorisnik and hotel.idhotel = moderator_hotela.idhotel and
korisnik.idkorisnik =" . $idKorisnik . " and  tip_korisnika.idtip_korisnika = 2;";
$rs = $baza->selectDB($sql);
while (list($naziv, $putanja_slike, $idhotel, $ulica, $email, $broj_zvjezdica) = $rs->fetch_array()) { // ispis svih hotela (slike)
    if (file_exists("./slike/hoteli/" . $putanja_slike)) {
        $mojiHoteli .= "<div class='galerija1'>";
        $mojiHoteli .= "<img style='width:100%' src='./slike/hoteli/" . $putanja_slike . "'>";
        $mojiHoteli .= "<div class='galerija2'>";
        $mojiHoteli .= "<p style='font-weight: bold;'>" . $naziv . "</p>";
        $mojiHoteli .= "<p>Ulica: " . $ulica . "</p>";
        $mojiHoteli .= "<p>Email: " . $email . "</p>";
        $mojiHoteli .= "<p>Broj zvjezdica: " . $broj_zvjezdica . "</p>";
        $mojiHoteli .= "</div>";
        $mojiHoteli .= "</div>";
    }
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('mojiHoteli', $mojiHoteli);
$smarty->assign('pozdravKorisniku', $korime);
$smarty->assign('naslov', "Moji hoteli");
$smarty->assign('korisnik', $korisnik);
$smarty->assign('moderator', $moderator);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/mojiHoteli.tpl');
$smarty->display('predlosci/footer.tpl');
?>
