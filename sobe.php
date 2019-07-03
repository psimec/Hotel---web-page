<?php

$slanje = $_SERVER['PHP_SELF'];

include_once './klase//dnevnik.php';
include_once './klase//mail.php';
include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();

$sql = "select naziv from hotel";
$rs = $baza->selectDB($sql);
$nazivi_hotela = "";
$opisSobe = "";

$ispisPotvrda = "";
$potvrda = "";


$nazivi_hotela .= "<option>== Odaberi naziv hotela ==</option>\n";
while (list($naziv) = $rs->fetch_array()) {
    $nazivi_hotela .= "<option>$naziv</option>\n";
}

$sobeHotela = ""; // varijabla za ispis soba ako se klikne na hotel
$tablica = ""; // varijabla za ispis soba kod pretrage

if (isset($_GET["data"])) { // ako se na stranicu dode klikom na hotel na stranici hoteli
    $idhotel = $_GET["data"];

    $upit = "SELECT soba.opis, COUNT(idrezervacija), hotel.naziv, soba.broj_lezaja, soba.idsoba FROM soba LEFT JOIN rezervacija ON soba.idsoba=rezervacija.idsoba JOIN hotel ON hotel.idhotel = soba.idhotel where hotel.idhotel ='" . $idhotel . "' group by soba.idsoba;";
    $rs = $baza->selectDB($upit);
    if (mysqli_num_rows($rs) > 0) {
        $sobeHotela .= "<table id='sobeTablica' border=1><tr><th>Opis sobe</th><th>Velicina sobe</th><th>Ukupne rezervacije</th><th>Naziv hotela</th></tr>\n";
        while (list($opis, $rezervacije, $hotelNaziv, $velicina, $soba) = $rs->fetch_array()) {
            $sobeHotela .= "<tr><td><a href='sobe.php?soba=" . $soba . "'>$opis</td><td>$velicina</td><td>$rezervacije</td><td>$hotelNaziv</td></tr>\n";
        }
    } else {
        $potvrda .= "Nema podataka";
    }
} else {
    if (isset($_POST["hotel"])) { // ako se normalno pretrazuje stranicu
        $hotel = $_POST["hotel"];
        $opisSobe = $_POST["velicina_sobe"];
        $datumOd = date("Y-m-d H:i:s", strtotime($_POST["period_od"]));
        $datumDo = date("Y-m-d H:i:s", strtotime($_POST["period_do"]));

        $upit = "SELECT soba.opis, COUNT(idrezervacija), hotel.naziv, soba.broj_lezaja, soba.idsoba FROM"
                . " soba LEFT JOIN rezervacija ON soba.idsoba=rezervacija.idsoba JOIN hotel on hotel.idhotel = soba.idhotel";

        $brojac = 0;
        if ($hotel != "== Odaberi naziv hotela ==" || $opisSobe != "== Odaberi vrstu sobe ==" || !empty($_POST["period_od"]) || !empty($_POST["period_do"])) {
            $upit .= " WHERE";
        }
        if ($hotel != "== Odaberi naziv hotela ==") {
            $brojac++;
        }
        if ($opisSobe != "== Odaberi vrstu sobe ==") {
            $brojac++;
        }
        if (!empty($_POST["period_od"]) && !empty($_POST["period_do"])) {
            $brojac++;
        }
        if ($hotel != "== Odaberi naziv hotela ==") {
            $upit .= " hotel.naziv='" . $hotel."'";
            $brojac--;
            if ($brojac > 0) {
                $upit .= " AND";
            }
        }

        if ($opisSobe != "== Odaberi vrstu sobe ==") {
            $upit .= " soba.opis='" . $opisSobe."'";
            $brojac--;
            if ($brojac > 0) {
                $upit .= " AND";
            }
        }
        if (!empty($_POST["period_od"]) && !empty($_POST["period_do"])) {
            $upit .= " soba.idsoba NOT IN (SELECT soba.idsoba FROM rezervacija WHERE rezervacija.datum_dolaska BETWEEN '" . $datumOd . "' AND '" . $datumDo . "')";
        }

        $upit .= " GROUP BY soba.idsoba";
        $rs = $baza->selectDB($upit);

        if (mysqli_num_rows($rs) > 0) {
            $tablica .= "<table id='sobeTablica' border=1><tr><th>Opis sobe</th><th>Velicina sobe</th><th>Ukupne rezervacije</th><th>Naziv hotela</th></tr>\n";
            while (list($opis, $rezervacije, $hotelNaziv, $velicina, $soba) = $rs->fetch_array()) {
                $tablica .= "<tr><td><a href='sobe.php?soba=" . $soba . "'>$opis</a></td><td>$velicina</td><td>$rezervacije</td><td>$hotelNaziv</td></tr>\n";
            }
        } else {
            $potvrda .= "Nema podataka";
        }
    } else {
        $upit = "SELECT soba.opis, COUNT(idrezervacija), hotel.naziv, soba.broj_lezaja, soba.idsoba "
                . "FROM soba LEFT JOIN rezervacija ON soba.idsoba=rezervacija.idsoba JOIN hotel ON hotel.idhotel = soba.idhotel group by soba.idsoba";
        $rs = $baza->selectDB($upit);
        $tablica .= "<table id='sobeTablica' border=1><tr><th>Opis sobe</th><th>Velicina sobe</th><th>Ukupne rezervacije</th><th>Naziv hotela</th></tr>\n";
        while (list($opis, $rezervacije, $hotelNaziv, $velicina, $soba) = $rs->fetch_array()) {
            $tablica .= "<tr><td><a href='sobe.php?soba=" . $soba . "'>$opis</td><td>$velicina</td><td>$rezervacije</td><td>$hotelNaziv</td></tr>\n";
        }
    }
}

if (isset($_GET["soba"])) { // ako je stisnut link sobe 
    $idsoba = $_GET["soba"];
    $upit = "SELECT opis, ukupan_broj_rezervacija, putanja_do_slike FROM soba where idsoba=" . $idsoba . ";";
    $rs = $baza->selectDB($upit);
    $podaci = $rs->fetch_array();
    $opis = $podaci["opis"];
    $rez = $podaci["ukupan_broj_rezervacija"];
    $putanjaSlike = $podaci["putanja_do_slike"];

    $opisSobe .= "<div class='prikazSlike1'>";
    $opisSobe .= "<img style='width:100%' src='./slike/sobe/" . $putanjaSlike . "'></a>";
    $opisSobe .= "<div class='prikazSlike2'>";
    $opisSobe .= "<p>" . $opis . "</p><br>";
    $opisSobe .= "<p> Broj rezervacija " . $rez . "</p>";
    $opisSobe .= "</div>";
    $opisSobe .= "</div>";
}

if (isset($_POST["sadrzaj"]) && isset($_POST["naslov"])) {
    if (!empty($_POST["sadrzaj"]) && !empty($_POST["naslov"])) {
        $naslov = $_POST["naslov"];
        $sadrzaj = $_POST["naslov"];
        $mail = new mail();
        // $mail->set_podaci( $, $p_mail_body); poslati mail više moderatora
        // $mail->posaljiMail();
        dnevnik::ostalo($_SERVER['REMOTE_ADDR'], $naslov . " " . $sadrzaj, "mail za rezervaciju sobe"); //upis dnevnik
        $potvrda .= "Zahtjev je mail-om poslan zaduženoj osobi";
    }
}

if ($potvrda != "") {
    $ispisPotvrda = "<div class='isa_info'>$potvrda</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('tablica', $tablica);
$smarty->assign('naslov', "Sobe");
$smarty->assign('slanje', $slanje);
$smarty->assign('potvrda', $ispisPotvrda);
$smarty->assign('sobeHotela', $sobeHotela);
$smarty->assign('hoteli', $nazivi_hotela);
$smarty->assign('opisSobe', $opisSobe);
$smarty->display('predlosci/nePrijavljeniHeader.tpl');
if (isset($_GET["soba"])) {
    $smarty->display('stranice_predlosci/sobaPrikaz.tpl');
} else {
    $smarty->display('stranice_predlosci/sobe.tpl');
}
$smarty->display('predlosci/footer.tpl');
$baza->zatvoriDB();
?>

