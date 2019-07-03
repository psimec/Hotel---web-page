<?php

$slanje = $_SERVER['PHP_SELF'];
include_once './klase//baza.class.php';
include_once './klase//dnevnik.php';
include_once './klase//korisnik.php';
include_once './klase//mail.php';
$baza = new Baza();
$baza->spojiDB();

$ispisPotvrda = "";
$potvrda = "";
$greska = "";
$ispisGreska = "";

function provjeriZnakove($vrijednost) {
    global $greska;
    for ($i = 0; $i < strlen($vrijednost); $i++) {
        $slovo = $vrijednost[$i];
        if ($slovo == "!" || $slovo == "#" || $slovo == "?" || $slovo == "'") {
            $greska .= "Nedozvoljeni znak: " . $slovo . "<br>";
            $vrijednost . trim($vrijednost, "!#?'");
        }
    }
}

if (isset($_POST["korime"])) {
    foreach ($_POST as $k => $v) {
        if (empty($v)) {
            $greska .= "Niste unijeli vrijednost u polju: " . $k . "<br/>";
        }
    }

    provjeriZnakove($_POST["korime"]);
    provjeriZnakove($_POST["ime"]);
    provjeriZnakove($_POST["prezime"]);
    provjeriZnakove($_POST["lozinka"]);
    provjeriZnakove($_POST["ulica"]);
    provjeriZnakove($_POST["grad"]);
    provjeriZnakove($_POST["drzava"]);
    provjeriZnakove($_POST["email"]);

    $uzorak = '/^\w+.?\w+@\w+\.[a-zA-Z]{2,}$/';
    if (!empty($email)) {
        if (!preg_match($uzorak, $_POST["email"]) || strlen($_POST["email"] > 30) || strlen($_POST["email"]) < 8) {
            $greska .= "Neispravan unos email-a!<br>";
        }
    }

    if ($_POST["lozinka"] !== $_POST["ponovljena_lozinka"]) {
        $greska .= "Lozinke nisu iste" . "<br/>";
    }

    $upit = "SELECT korisnicko_ime , email FROM korisnik ";
    $rs = $baza->selectDB($upit);

    while (list($kor, $email) = $rs->fetch_array()) {
        if ($email == $_POST["email"]) {
            $greska .= "Email " . $_POST["email"] . " vec postoji" . "<br/>";
        }
        if ($kor == $_POST["korime"]) {
            $greska .= "Korisnicko ime " . $_POST["korime"] . " vec postoji" . "<br/>";
        }
    }

    if (empty($greska)) {
        $korisnik = new Korisnik();
        $korisnik->set_podaci($_POST["korime"], $_POST["ime"], $_POST["prezime"], $_POST["lozinka"], $_POST["ulica"], $_POST["grad"], $_POST["drzava"], $_POST["email"]);
        $korisnik->upisi_korisnika();
        //$korisnik->posaljiAktivaciju();
        dnevnik::registracija($_POST["korime"], 1);
        $potvrda .= "Registracija uspjesna, poslan Vam je mail s aktivacijskih kodom";
    }
}

if (isset($_GET["data"])) {
    $danasnjiDatum = date("Y-m-d H:i:s"); // virtualno vrijeme
    $vrijediDo = date($_GET["traje"]);
    if ($danasnjiDatum < $vrijediDo) {
        //mjenja u bazi aktviaciju korisnika 
        $korime = $_GET["data"];
        $sql = "UPDATE korisnik SET status = 'normalan' WHERE korisnicko_ime = '" . $korime . "';";
        $rs = $baza->selectDB($sql);
        $potvrda .= "Korisnički račun aktiviran";
    }
}

if ($potvrda != "") {
    $ispisPotvrda = "<div class='isa_info'>$potvrda</div>";
}

if ($greska != "") {
    $ispisGreska = "<div class='isa_error'>$greska</div>";
}

include_once './okviri/oglas.php';
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('registracijaPoz1', $registracijaPoz1);
$smarty->assign('registracijaPoz2', $registracijaPoz2);
$smarty->assign('naslov', "Registracija");
$smarty->assign('slanje', $slanje);
$smarty->assign('ispisPotvrda', $ispisPotvrda);
$smarty->assign('ispisGreska', $ispisGreska);
$smarty->display('predlosci/nePrijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/registracija.tpl');
$smarty->display('predlosci/footer.tpl');
$baza->zatvoriDB();
?>

