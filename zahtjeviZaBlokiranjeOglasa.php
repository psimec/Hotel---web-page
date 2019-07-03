<?php
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

include_once './klase/mail.php';
include_once './klase/dnevnik.php';
include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();

$idKorisnik = $_SESSION["id"];
$korisnicko_ime = $_SESSION["korime"];

$sql = "SELECT oglas.naziv, zahtjev_za_blokiranje.opis, zahtjev_za_blokiranje.datum_zahtjeva , korisnik.korisnicko_ime, zahtjev_za_blokiranje.idzahtjev_za_blokiranje, oglas.idoglas, oglas.putanja_do_slike, oglas.url, oglas.opis from oglas, korisnik, zahtjev_za_blokiranje, vrsta_oglasa, pozicija_oglasa
where oglas.idoglas = zahtjev_za_blokiranje.idoglas and zahtjev_za_blokiranje.idkorisnik = korisnik.idkorisnik and oglas.idvrsta_oglasa = vrsta_oglasa.idvrsta_oglasa 
and vrsta_oglasa.idpozicija_oglasa = pozicija_oglasa.idpozicija_oglasa and pozicija_oglasa.idkorisnik = $idKorisnik and (zahtjev_za_blokiranje.status = '' or zahtjev_za_blokiranje.status = ' ')  and  oglas.status = 'prihvacen' order by 3;";
// upit koji dohvaca zahtjeve za blokiranje koji nisu obrađeni ali točno za moderatora koji je zadužen za poziciju na kojoj je oglas dobio zahtjev za blokiranjem

$rs = $baza->selectDB($sql);
$oglasi = ""; // varijabla za ispis oglasa koji imaju zahtjev za blokiranje
$ispisPotvrda = "";
$potvrda = "";
$listaOglasa = [];
$listaZahtjeva = []; //varijabla za pohranjivanje id oglasa koji imaju zahtjev za blokiranje
$akcijaOglas = ""; // varijabla za ispis elementa za odlucivanje sto ce se desit s oglasom

if (mysqli_num_rows($rs) > 0) {
    while (list($nazivOglasa, $opisBlokiranja, $datumZahtjeva, $korisnik, $idZahtjev, $idOglas, $putanjaSlikeOglasa, $urlOglasa, $opisOglasa) = $rs->fetch_array()) {
        if (file_exists("./slike/oglasi/" . $putanjaSlikeOglasa)) {
            $oglasi .= "<div class='prikazSlike1'>";
            $oglasi .= "<a href='$urlOglasa'><img style='width:100%' src='./slike/oglasi/" . $putanjaSlikeOglasa . "'></a>";
            $oglasi .= "<div class='prikazSlike2'>";
            $oglasi .= "<p style='font-weight: bold;'>" . $nazivOglasa . "</p>";
            $oglasi .= "<p>Opis oglasa: " . $opisOglasa . "</p><br/><br/>";
            $oglasi .= "<p style='font-weight: bold;'>Datum zahtjeva za blokiranje: " . $datumZahtjeva . "</p>";
            $oglasi .= "<p style='font-weight: bold;'>Zahtjevac blokiranja: " . $korisnik . "</p>";
            $oglasi .= "<p style='font-weight: bold;'>Razlog blokiranja: " . $opisBlokiranja . "</p>";
            $oglasi .= "</div>";
            $oglasi .= "</div>";

            if (!in_array($idOglas, $listaOglasa)) {
                $listaOglasa[$idOglas] = $nazivOglasa;
                $listaZahtjeva[$idOglas] = $idZahtjev;
            }
        }
    }
} else {
    $potvrda .= "Trenutno nema zahtjeva";
}
// ne radi dobro ako su dva zatjeva za isti oglas i zahtjev je odbijen onda se onaj koji je niži u spsisuje updata u zahtjev odbijen
foreach ($listaOglasa as $brojOglasa => $naziv) {
    $akcijaOglas .= "<p style='font-weight: bold;'>" . $naziv . "</p>";
    $akcijaOglas .= "<input type='radio' name='$brojOglasa' value='nijeBlokiran'> Ignoriraj zahtjev za blokiranjem";
    $akcijaOglas .= "<input type='radio' id='tmp' name='$brojOglasa' value='blokiran'> Blokiraj oglas" . "<br/><br/>";
}

if (isset($_POST["posalji"])) {
    foreach ($_POST as $k => $v) {
        if ($k != "posalji") {
            $brojOglasa = $k;
            $brojZahtjeva = $listaZahtjeva[$k];
            if ($v == "nijeBlokiran") {
                //update zatjev pod tim brojem u odbijen
                $sql = "UPDATE zahtjev_za_blokiranje SET status='odbijen' WHERE idzahtjev_za_blokiranje = " . $brojZahtjeva . ";";
                $baza->updateDB($sql);
                dnevnik::update($korisnicko_ime, $sql, 1);
            } else {
                //update oglas pod tim brojem u blokiran
                $sql = "UPDATE oglas SET status='blokiran' WHERE idoglas = " . $brojOglasa . ";";
                $baza->updateDB($sql);
                dnevnik::update($korisnicko_ime, $sql, 1);
                // email blokiran korisnicki racun
                // dohvacanje podataka za slanje mail-a
                $sql = "SELECT korisnik.email, korisnik.korisnicko_ime, oglas.naziv from korisnik, oglas where korisnik.idkorisnik = oglas.idkorisnik and oglas.idoglas = $brojOglasa";
                $rs = $baza->selectDB($sql);
                $podaci = $rs->fetch_array();
                $email = podaci["email"];
                $korime = podaci["korisnicko_ime"];
                $imeOglsa = podaci["naziv"];

                $poruka = "Poštovani $korime, \n\n "
                        . "Vaš oglas '$nazivOglasa' na stranici 'Hoteli' je blokiran\n\n"
                        . "Kako bi saznali više informacija molimo Vas da se javite ovlaštenim osobama na 'info@d_hotel.com'";
                $mail = new mail();
                $mail->set_podaci($email, "Blokiranje oglasa", $poruka);
                //$mail->posaljiMail();
            }
            header("Location: zahtjeviZaBlokiranjeOglasa.php");
        }
    }
}

if ($potvrda != "") {
    $ispisPotvrda = "<div class='isa_info'>$potvrda</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik', $korisnik);
$smarty->assign('pozdravKorisniku', $korisnicko_ime);
$smarty->assign('moderator', $moderator);
$smarty->assign('naslov', "Zatjevi za Blokiranje oglasa");
$smarty->assign('slanje', $slanje);
$smarty->assign('oglasi', $oglasi);
$smarty->assign('ispisPotvrda', $ispisPotvrda);
$smarty->assign('akcijaOglas', $akcijaOglas);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/zahtjeviZaBlokiranjeOglasa.tpl');
$smarty->display('predlosci/footer.tpl');
?>

