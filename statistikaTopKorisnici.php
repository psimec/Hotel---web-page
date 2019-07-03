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

include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();

$pretraga = "";
$ispisPotvrda = "";
$potvrda = "";


if (isset($_POST["brojKorisnika"])) { // ako je forma poslana
    $datumOd = date("Y-m-d H:i:s", strtotime($_POST["period_od"]));
    $datumDo = date("Y-m-d H:i:s", strtotime($_POST["period_do"]));
    $brojKorisnika = $_POST["brojKorisnika"];
    $dodaj = ""; // varijabla za uvijete pretrazivanja
    $dodajLimit = "";

    if (!empty($_POST["period_od"])) { // ako od je upisan
        $dodaj .= "and oglas.aktivan_od >= '" . $datumOd . "'";
    }
    if (!empty($_POST["period_do"])) {// ako do je upisan
        $dodaj .= "and oglas.aktivan_od <= '" . $datumDo . "'";
    }
    if ($_POST["brojKorisnika"] != 0) {// ako korisnik upisan
        $dodajLimit .= "LIMIT $brojKorisnika";
    }

    $upit = "select count(oglas.idoglas), korisnik.korisnicko_ime from oglas left join  korisnik on oglas.idkorisnik = korisnik.idkorisnik 
            where oglas.idkorisnik = korisnik.idkorisnik $dodaj
            group by 2  order by 1 desc $dodajLimit;";

    $rs = $baza->selectDB($upit);
    if (mysqli_num_rows($rs) > 0) {
        $pretraga .= "<table id='sobeTablica' border=1><tr><th>Korisnik</th><th>Broj oglasa</th></tr>\n";
        while (list($oglasi, $korime) = $rs->fetch_array()) {
            $pretraga .= "<tr><td>$korime</td><td>$oglasi</td></tr>\n";
        }
    } else {
        $potvrda .= "Nema podataka";
    }
} else {

    $pretraga .= "<table id='sobeTablica' border=1><tr><th>Korisnik</th><th>Broj oglasa</th></tr>\n";
    $upit = "select count(oglas.idoglas), korisnik.korisnicko_ime from oglas left join  korisnik on oglas.idkorisnik = korisnik.idkorisnik 
    group by 2  order by 1 desc LIMIT 5;";

    $rs = $baza->selectDB($upit);

    while (list($oglasi, $korime) = $rs->fetch_array()) {
        $pretraga .= "<tr><td>$korime</td><td>$oglasi</td></tr>\n";
    }
}

if ($potvrda != "") {
    $ispisPotvrda = "<div class='isa_info'>$potvrda</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik',"");
$smarty->assign('moderator',"");
$smarty->assign('pozdravKorisniku',$_SESSION["korime"]);
$smarty->assign('slanje', $slanje);
$smarty->assign('pretraga', $pretraga);
$smarty->assign('ispisPotvrda', $ispisPotvrda);
$smarty->assign('naslov', "Statistika top korisnika");
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/statistikaTopKorisnici.tpl');
$smarty->display('predlosci/footer.tpl');
?>