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

$oglasi = "";
$ispisPotvrda = "";
$potvrda = "";

$korime = $_SESSION["korime"];
$idKorisnik = $_SESSION["id"];


$upit = "select oglas.naziv, oglas.opis, oglas.url, oglas.putanja_do_slike, oglas.idoglas  from oglas, vrsta_oglasa, pozicija_oglasa where  oglas.idvrsta_oglasa = vrsta_oglasa.idvrsta_oglasa and vrsta_oglasa.idpozicija_oglasa = pozicija_oglasa.idpozicija_oglasa 
and pozicija_oglasa.idkorisnik = " . $idKorisnik . " and (oglas.status = '' or oglas.status = ' ');";
$rs = $baza->selectDB($upit);
$radioOdabir = "";
$listaOglasa = "";
if (mysqli_num_rows($rs) > 0) {
    while (list($naziv, $opis, $url, $putanja, $idOglas) = $rs->fetch_array()) { // ispis svih oglasa koji nisu aktivni (slike)
        if (file_exists("./slike/oglasi/" . $putanja)) {  
            $oglasi .= "<div class='prikazSlike1'>";
            $oglasi .= "<a href='$url'><img style='width:100%' src='./slike/oglasi/" . $putanja . "'></a>";
            $oglasi .= "<div class='prikazSlike2'>";
            $oglasi .= "<p style='font-weight: bold;'>" . $naziv . "</p>";
            $oglasi .= "<p>Opis: " . $opis . "</p>";
            $oglasi .= "<input type='radio' id='tmp' name='$idOglas' value='prihvacen'> Prihvati";
            $oglasi .= "<input type='radio' name='$idOglas' value='odbijen'> Odbi";
            $oglasi .= "</div>";
            $oglasi .= "</div>";
            $listaOglasa[] = $idOglas;
        }
    }
    $oglasi .= "<input type='submit' class='button' value='Unesi promijene'>";
} else {
    $potvrda .= "Trenutno nema zahtjeva";
}


if (isset($_POST["posalji"])) {// update podataka u bazi
    foreach ($_POST as $k => $v) {
        if ($k != "posalji") {
            $oglasId = $k;
            $status = $v;
            $sql = "UPDATE oglas SET status='" . $status . "' WHERE idoglas = " . $oglasId . ";";
            $baza->updateDB($sql);
            dnevnik::update($korime, $sql, 1);
        }
    }
    header("Location: zahtjeviZaOglasavanje.php");
}

if ($potvrda != "") {
    $ispisPotvrda = "<div class='isa_info'>$potvrda</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik', $korisnik);
$smarty->assign('pozdravKorisniku', $korime);
$smarty->assign('moderator', $moderator);
$smarty->assign('naslov', "Popis zahtjeva za oglašavanje");
$smarty->assign('slanje', $slanje);
$smarty->assign('ispisPotvrda', $ispisPotvrda);
$smarty->assign('oglasi', $oglasi);
$smarty->assign('radioOdabir', $radioOdabir);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/zahtjeviZaOglasavanje.tpl');
$smarty->display('predlosci/footer.tpl');
?>
