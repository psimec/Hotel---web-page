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

$korisnici = "";
$pretraga = "";
$ispisPotvrda = "";
$potvrda = "";

$sql = "select korisnicko_ime, idkorisnik from korisnik order by 1;";
$rs = $baza->selectDB($sql);

$korisnici .= "<option>== Odaberi korisnika ==</option>\n";
while (list($korime, $id) = $rs->fetch_array()) { // dohvacanje vrsta oglasa
    $korisnici .= "<option value='$id'>$korime</option>\n";
}

if (isset($_POST["period_od"])) { // ako je forma poslana
    $datumOd = date("Y-m-d H:i:s", strtotime($_POST["period_od"]));
    $datumDo = date("Y-m-d H:i:s", strtotime($_POST["period_do"]));
    $korisnik = $_POST["korisnici"];
    $dodaj = ""; // varijabla za uvijete pretrazivanja

    if (!empty($_POST["period_od"])) { // ako od je upisan
        $dodaj .= "and klik.datum > '" . $datumOd . "'";
    }
    if (!empty($_POST["period_do"])) {// ako do je upisan
        $dodaj .= "and klik.datum < '" . $datumDo . "'";
    }
    if ($_POST["korisnici"] != "== Odaberi korisnika ==") {// ako korisnik upisan
        $dodaj .= "and oglas.idkorisnik=" . $korisnik . "";
    }

    $upit = "select oglas.naziv, oglas.opis, oglas.status, count(klik.idoglas), oglas.idvrsta_oglasa, korisnik.korisnicko_ime from oglas left join  klik on oglas.idoglas = klik.idoglas
        join korisnik on korisnik.idkorisnik = oglas.idkorisnik where korisnik.idkorisnik = oglas.idkorisnik " . $dodaj . "
         group by 1 order by 4 desc;";

    $rs = $baza->selectDB($upit);
    if (mysqli_num_rows($rs) > 0) {
        $pretraga .= "<table id='sobeTablica' border=1><tr><th>Naziv</th><th>Opis</th><th>Status</th><th>Broj klikova</th><th>Vrsta oglasa</th><th>Korisnik</th></tr>\n";
        while (list($naziv, $opis, $status, $brojKlikova, $vrsta_oglasa, $korime) = $rs->fetch_array()) {
            $pretraga .= "<tr><td>$naziv</td><td>$opis</td><td>$status</td><td>$brojKlikova</td><td>$vrsta_oglasa</td><td>$korime</td></tr>\n";
        }
    } else {
        $potvrda .= "Nema podataka";
    }
} else {

    $pretraga .= "<table id='sobeTablica' border=1><thead><tr><th>Naziv</th><th>Opis</th><th>Status</th><th>Broj klikova</th><th>Vrsta oglasa</th><th>Korisnik</th></tr></thead><tbody>\n";
    $upit = "select oglas.naziv, oglas.opis, oglas.status, count(klik.idoglas), oglas.idvrsta_oglasa, korisnik.korisnicko_ime from oglas left join  klik on oglas.idoglas = klik.idoglas
        join korisnik on korisnik.idkorisnik = oglas.idkorisnik
         group by 1 order by 4 desc;";

    $rs = $baza->selectDB($upit);

    while (list($naziv, $opis, $status, $brojKlikova, $vrsta_oglasa, $korime) = $rs->fetch_array()) {
        $pretraga .= "<tr><td>$naziv</td><td>$opis</td><td>$status</td><td>$brojKlikova</td><td>$vrsta_oglasa</td><td>$korime</td></tr>\n";
    }
    $pretraga .= "</tbody></table>";
}

if ($potvrda != "") {
    $ispisPotvrda = "<div class='isa_info'>$potvrda</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik',"");
$smarty->assign('moderator',"");
$smarty->assign('pozdravKorisniku',$_SESSION["korime"]);
$smarty->assign('korisnici', $korisnici);
$smarty->assign('slanje', $slanje);
$smarty->assign('pretraga', $pretraga);
$smarty->assign('ispisPotvrda', $ispisPotvrda);
$smarty->assign('naslov', "Statistika klikova oglasa");
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/statistikaKlikovi.tpl');
$smarty->display('predlosci/footer.tpl');
?>