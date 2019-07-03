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

$sql = "SELECT vrsta_oglasa.idvrsta_oglasa, vrsta_oglasa.trajanje_prikazivanja, vrsta_oglasa.brzina_izmjene,"
        . "vrsta_oglasa.cijena, pozicija_oglasa.stranica, pozicija_oglasa.broj_lokacije FROM vrsta_oglasa, pozicija_oglasa WHERE vrsta_oglasa.idpozicija_oglasa = pozicija_oglasa.idpozicija_oglasa ORDER BY 5;";
$rs = $baza->selectDB($sql);
$vrstaOglasa = "";
$pretraga = "";
$ispisPotvrda = "";
$potvrda = "";

$idkorisnik = $_SESSION["id"];
$korime = $_SESSION["korime"];

$vrstaOglasa .= "<option>== Odaberi vrstu oglasa ==</option>\n";
while (list($id, $trajanje, $brzina, $cijena, $stranica, $lokacija) = $rs->fetch_array()) { // dohvati vrste oglasa za selecet dio
    $vrstaOglasa .= "<option value='$id'>Stranica: $stranica, $lokacija, trajanje $trajanje dana, brzina $brzina sec, cijena $cijena kn</option>\n";
}

if (isset($_POST["period_od"])) { // ako je forma poslana
    $datumOd = date("Y-m-d H:i:s", strtotime($_POST["period_od"]));
    $datumDo = date("Y-m-d H:i:s", strtotime($_POST["period_do"]));
    $vrOglasa = $_POST["vrstaOglasa"];
    $dodaj = ""; // varijabla za uvijete pretrazivanja
    $dodajSortiranje = ""; // varijabla za uvijete sortiranja

    if (isset($_POST['radio'])) { // ako je odabran nacin sortiranja
        $nacinSortiranja = $_POST['radio'];
        if ($nacinSortiranja == "manje") { // ako je oznaceno od manje prema vise
            $dodajSortiranje = "order by klik";
        } else {                            // ako je oznaceno vise prema manje
            $dodajSortiranje = "order by klik desc";
        }
    }

    if (!empty($_POST["period_od"])) { // ako od je upisan
        $dodaj .= "and klik.datum > '" . $datumOd . "'";
    }
    if (!empty($_POST["period_do"])) {// ako do je upisan
        $dodaj .= "and klik.datum < '" . $datumDo . "'";
    }
    if ($_POST["vrstaOglasa"] != "== Odaberi vrstu oglasa ==") { // ako je upisana vrsta
        $dodaj .= "and oglas.idvrsta_oglasa = " . $vrOglasa . "";
    }

    $upit = "select oglas.naziv, oglas.opis, oglas.status, count(klik.idoglas) as klik, oglas.idvrsta_oglasa  from oglas left join  klik on oglas.idoglas = klik.idoglas
        where oglas.idkorisnik=" . $idkorisnik . " " . $dodaj . " group by 1 " . $dodajSortiranje . ";";

    $rs = $baza->selectDB($upit);
    if (mysqli_num_rows($rs) > 0) {
        $pretraga .= "<table id='sobeTablica' border=1><tr><th>Naziv</th><th>Opis</th><th>Status</th><th>Broj klikova</th><th>Vrsta oglasa</th></tr>\n";
        while (list($naziv, $opis, $status, $brojKlikova, $vrsta_oglasa) = $rs->fetch_array()) {
            $pretraga .= "<tr><td>$naziv</td><td>$opis</td><td>$status</td><td>$brojKlikova</td><td>$vrsta_oglasa</td></tr>\n";
        }
    } else {
        $potvrda .= "Nema podataka";
    }
} else { //ako korisnik dode na stranicu bez da salje formu
    $pretraga .= "<table id='sobeTablica' border=1><tr><th>Naziv</th><th>Opis</th><th>Status</th><th>Broj klikova</th><th>Vrsta oglasa</th></tr>\n";
    $upit = "select oglas.naziv, oglas.opis, oglas.status, count(klik.idoglas), oglas.idvrsta_oglasa  from oglas left join  klik on oglas.idoglas = klik.idoglas
        where oglas.idkorisnik=" . $idkorisnik . " group by 1;";

    $rs = $baza->selectDB($upit);

    while (list($naziv, $opis, $status, $brojKlikova, $vrsta_oglasa) = $rs->fetch_array()) {
        $pretraga .= "<tr><td>$naziv</td><td>$opis</td><td>$status</td><td>$brojKlikova</td><td>$vrsta_oglasa</td></tr>\n";
    }
}

if ($potvrda != "") {
    $ispisPotvrda = "<div class='isa_info'>$potvrda</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('naslov', "Statistika mojih oglasa");
$smarty->assign('korisnik', $korisnik);
$smarty->assign('pozdravKorisniku', $korime);
$smarty->assign('moderator', $moderator);
$smarty->assign('vrstaOglasa', $vrstaOglasa);
$smarty->assign('slanje', $slanje);
$smarty->assign('pretraga', $pretraga);
$smarty->assign('ispisPotvrda', $ispisPotvrda);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/statistikaKorisnik.tpl');
$smarty->display('predlosci/footer.tpl');
?>