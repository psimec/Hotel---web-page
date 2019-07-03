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

if (isset($_POST["nacin"])) {
    $datumOd = date("Y-m-d H:i:s", strtotime($_POST["period_od"]));
    $datumDo = date("Y-m-d H:i:s", strtotime($_POST["period_do"]));
    $nacin = "";
    $dodaj = "";
    foreach ($_POST as $k => $v) {
        if ($k == "nacin") {
            $nacin = $v;
        }
    }
    if ($nacin == "vrsta") { // ako se odabere vrsta
        if (!empty($_POST["period_od"])) { // ako od je upisan
            $dodaj .= "and oglas.aktivan_od >= '" . $datumOd . "'";
        }
        if (!empty($_POST["period_do"])) {// ako do je upisan
            $dodaj .= "and oglas.aktivan_od <= '" . $datumDo . "'";
        }

        $sql = "select count(oglas.idoglas), vrsta_oglasa.trajanje_prikazivanja, vrsta_oglasa.brzina_izmjene, vrsta_oglasa.cijena from oglas left join vrsta_oglasa
                on vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa where vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa $dodaj group by 2 order by 1 desc";
        $rs = $baza->selectDB($sql);
        if (mysqli_num_rows($rs) > 0) {
            $pretraga .= "<table id='sobeTablica' border=1><tr><th>Broj oglasa za vrstu</th><th>Trajanje</th><th>Brzina</th><th>Cijena</th></tr>\n";
            while (list($oglasi, $trajanje, $brzina, $cijena) = $rs->fetch_array()) {
                $pretraga .= "<tr><td>$oglasi</td><td>$trajanje</td><td>$brzina</td><td>$cijena</td></tr>\n";
            }
        } else {
            $potvrda .= "Nema podataka";
        }
    } else { // ako se odabere pozicija
        if (!empty($_POST["period_od"])) { // ako od je upisan
            $dodaj .= "and oglas.aktivan_od >= '" . $datumOd . "'";
        }
        if (!empty($_POST["period_do"])) {// ako do je upisan
            $dodaj .= "and oglas.aktivan_od <= '" . $datumDo . "'";
        }

        $sql = "select count(oglas.idoglas),pozicija_oglasa.stranica, pozicija_oglasa.broj_lokacije from oglas left join vrsta_oglasa
                on vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa
                left join pozicija_oglasa on vrsta_oglasa.idpozicija_oglasa = pozicija_oglasa.idpozicija_oglasa
                where vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa $dodaj
                group by 2 order by 1 desc";
        $rs = $baza->selectDB($sql);

        if (mysqli_num_rows($rs) > 0) {
            $pretraga .= "<table id='sobeTablica' border=1><tr><th>Broj oglasa za poziciju</th><th>Stranica</th><th>Lokacija</th></tr>\n";
            while (list($oglasi, $stranica, $lokacija) = $rs->fetch_array()) {
                $pretraga .= "<tr><td>$oglasi</td><td>$stranica</td><td>$lokacija</td></tr>\n";
            }
        } else {
            $potvrda .= "Nema podataka";
        }
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
$smarty->assign('naslov', "Statistika placenih oglasa");
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/statistikaPlaceniOglasi.tpl');
$smarty->display('predlosci/footer.tpl');
?>