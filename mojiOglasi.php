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
$baza = new Baza();
$baza->spojiDB();

$idKorisnik = $_SESSION["id"];
$korime = $_SESSION["korime"];

$sql = "SELECT naziv, opis,status, putanja_do_slike, idoglas FROM oglas where idkorisnik='" . $idKorisnik . "';";
$rs = $baza->selectDB($sql);
$galerijaOglas = "";

while (list($naziv, $opis, $status, $putanja_slike, $idoglas) = $rs->fetch_array()) { // ispis svih zahtjeva za oglase u obliku galerije
    if (file_exists("./slike/oglasi/" . $putanja_slike)) {
        
        $galerijaOglas .= "<div class='galerija1'>";
        if ($status == "" || $status == " ") { // ako oglas nije prihvace, stalja se link da se moze urediti
            $galerijaOglas .= "<a href='kreirajOglas.php?idoglas=".$idoglas."'><img style='width:100%' src='./slike/oglasi/" . $putanja_slike . "'></a>";
        } else {
            $galerijaOglas .= "<img style='width:100%' src='./slike/oglasi/" . $putanja_slike . "'>";
        }
        $galerijaOglas .= "<div class='galerija2'>";
        $galerijaOglas .= "<p style='font-weight: bold;'>" . $naziv . "</p>";
        $galerijaOglas .= "<p>Opis: " . $opis . "</p>";
        if ($status == "" || $status == " ") { 
            $galerijaOglas .= "<p style='font-weight: bold;'>Status: oglas u razmatranju</p>";
            $galerijaOglas .= "<p'>Moguće uređivanje oglasa</p>";
        } else {
            $galerijaOglas .= "<p style='font-weight: bold;'>Status: " . $status . "</p>";           
        }
        $galerijaOglas .= "</div>";
        $galerijaOglas .= "</div>";
    }
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('naslov', "Moji oglasi");
$smarty->assign('slanje', $slanje);
$smarty->assign('pozdravKorisniku', $korime);
$smarty->assign('korisnik', $korisnik);
$smarty->assign('moderator', $moderator);
$smarty->assign('galerijaOglas', $galerijaOglas);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/mojiOglasi.tpl');
$smarty->display('predlosci/footer.tpl');
?>