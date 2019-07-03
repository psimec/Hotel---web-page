<?php

session_start();
if (!isset($_SESSION["korime"]) || !isset($_SESSION["tip"])) {
    header("Location: ./okviri/error.php?e=2");
    exit();
}

$slanje = $_SERVER['PHP_SELF'];

include_once './klase//baza.class.php';
include_once './klase//dnevnik.php';
$baza = new Baza();
$baza->spojiDB();

$ispisPotvrda = "";
$potvrda = "";
$greska = "";
$ispisGreska = "";

$sql = "SELECT ime, prezime, korisnicko_ime, ulica, grad, drzava, email, lozinka FROM korisnik WHERE idkorisnik = " . $_SESSION['id'] . ";";
$rs = $baza->selectDB($sql);
while (list($ime, $prezime, $korime, $ulica, $grad, $drzava, $email, $lozinka) = $rs->fetch_array()) { // dohvati sve moderatore
    $pisiIme = $ime;
    $pisiPrezime = $prezime;
    $pisiKorime = $korime;
    $pisiUlica = $ulica;
    $pisiDrzava = $drzava;
    $pisiGrad = $grad;
    $pisiEmail = $email;
    $pisiLozinka = $lozinka;
}

if (isset($_POST["ime"])) {

    foreach ($_POST as $k => $v) {
        if (empty($v)) {
            $greska .= "Niste unijeli vrijednost u polju: " . $k . "<br/>";
        }
    }

    if (empty($greska)) {

        $sql = "select sol from korisnik where idkorisnik = " . $_SESSION["id"] . ";";
        $rs = $baza->selectDB($sql);
        $podaci = $rs->fetch_array();
        $kriptiranaLozinka = sha1($podaci['sol'] . "-" . $_POST["lozinka"]);

        $sql = "UPDATE korisnik SET korisnicko_ime ='" . $_POST["korime"] . "' , ime ='" . $_POST["ime"] . "' ,prezime ='" . $_POST["prezime"] . "' , grad ='" . $_POST["grad"] . "' , drzava ='" . $_POST["drzava"] . "' , ulica ='" . $_POST["ulica"] . "' "
                . ",email ='" . $_POST["email"] . "' , lozinka ='" . $_POST["lozinka"] . "' , lozinka_kriptirana = '$kriptiranaLozinka' WHERE idkorisnik = " . $_SESSION["id"] . ";";
        
        if ($baza->updateDB($sql)) {
            dnevnik::ostalo($_SESSION["korime"], $sql, "Update korisickih podataka");
            $potvrda .= "Podaci upisani";
        } else {
            $greska .= "Doslo je do greske";
        }
    }
}

if ($potvrda != "") {
    $ispisPotvrda = "<div class='isa_info'>$potvrda</div>";
}

if ($greska != "") {
    $ispisGreska = "<div class='isa_error'>$greska</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->assign('pisiIme', $pisiIme);
$smarty->assign('pisiPrezime', $pisiPrezime);
$smarty->assign('pisiKorime', $pisiKorime);
$smarty->assign('pisiUlica', $pisiUlica);
$smarty->assign('pisiGrad', $pisiDrzava);
$smarty->assign('pisiDrzava', $pisiGrad);
$smarty->assign('pisiEmail', $pisiEmail);
$smarty->assign('pisiLozinka', $pisiLozinka);

$smarty->assign('ispisPotvrda', $ispisPotvrda);
$smarty->assign('ispisGreska', $ispisGreska);
$smarty->assign('korisnik', "");
$smarty->assign('moderator', "");
$smarty->assign('pozdravKorisniku', $_SESSION["korime"]);
$smarty->assign('naslov', "Uredi profil");
$smarty->assign('slanje', $slanje);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/urediKorisnik.tpl');
$smarty->display('predlosci/footer.tpl');
