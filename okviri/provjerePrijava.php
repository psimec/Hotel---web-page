<?php

include_once './klase//baza.class.php';
include_once './klase//mail.php';

function postojiKorime($korime) { // provjeri postoji li korisničko ime u bazi
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "SELECT idkorisnik FROM korisnik WHERE korisnicko_ime='" . $korime . "' and status = 'normalan';";
    $rs = $baza->selectDB($sql);
    $idkorisnika = $rs->fetch_array();
    $baza->zatvoriDB();
    $korisnik = $idkorisnika['idkorisnik'];
    if (!empty($korisnik)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function tocnaLozinka($korime, $lozinka) { // provjera je li se poklapaju lozine, kriptira se unesena te se usporeduje s kriptiranom u bazi
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "SELECT lozinka_kriptirana, sol FROM korisnik WHERE korisnicko_ime='" . $korime . "';";
    $rs = $baza->selectDB($sql);
    $podaci = $rs->fetch_array();
    $sol = $podaci['sol'];
    $kriptiranaLozinka = $podaci['lozinka_kriptirana'];
    $unesenaKriptirana = sha1($sol . "-" . $lozinka);
    if ($kriptiranaLozinka === $unesenaKriptirana) {
        return TRUE;
    } else {
        return FALSE;
    }
    $baza->zatvoriDB();
    //return $idkorisnika['idkorisnik'];  
}

function brojKrivihPrijava($korime) { //koliko korisnik ima krivih prijava
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "SELECT broj_krivih_prijava FROM korisnik WHERE korisnicko_ime='" . $korime . "';";
    $rs = $baza->selectDB($sql);
    $podaci = $rs->fetch_array();
    $krivePrijave = $podaci['broj_krivih_prijava'];
    $baza->zatvoriDB();
    return $krivePrijave;
}

function korisnikBlokiran($korime) { // provjera jeli je blokiran
    if (brojKrivihPrijava($korime) >= 3) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function dohvatiBlokirane() { // administrator dohvaća sve blokirane korisnike
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "SELECT korisnicko_ime FROM korisnik WHERE broj_krivih_prijava >= 3;";
    $rs = $baza->selectDB($sql);

    $listaBlokiranih = array();
    while (list($korime) = $rs->fetch_array()) {
        array_push($listaBlokiranih, $korime);
    }
    //print_r ($listaBlokiranih);
    $baza->zatvoriDB();
    return $listaBlokiranih;
}

function dohvatiTipKorisnika($korime) { // vraca tip korisnika za korisničko ime koje se pošalje
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "select idtip_korisnika from korisnik where korisnicko_ime = '" . $korime . "'";
    $rs = $baza->selectDB($sql);
    $podaci = $rs->fetch_array();
    $tipKorisnika = $podaci['idtip_korisnika'];
    return $tipKorisnika;
}

function povecajKrivePrijave($korime) { // ako korisnik je korisnik upisao dobro korisnicko ime ali lozinku nije povecava mu se broj krivih prijava
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "UPDATE korisnik SET broj_krivih_prijava = broj_krivih_prijava + 1 WHERE korisnicko_ime='" . $korime . "';";

    if (!$baza->updateDB($sql)) {
        return FALSE;
    } else {
        return TRUE;
    }
    $baza->zatvoriDB();
}

function resetirajKrivePrijave($korime) { // nakon što je korisnik prijavljen krive prijave se resetiraju na 0
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "UPDATE korisnik SET broj_krivih_prijava = 0 WHERE korisnicko_ime='" . $korime . "';";

    if (!$baza->updateDB($sql)) {
        return FALSE;
    } else {
        return TRUE;
    }
    $baza->zatvoriDB();
}

function promjeniLozinu($korime, $novaLozinka) { // koristi se kod zaboravljene lozinke, nova lozinka se upisuje u bazu te potom šalje na mail
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "select email from korisnik where korisnicko_ime = '" . $korime . "'"; // dohvaca email za slanja mail-a
    $rs = $baza->selectDB($sql);
    $podaci = $rs->fetch_array();
    $email = $podaci['email'];
    $poruka = "Poštovani, \n\n "
            . "Kreirana je nova lozinka, \n\n"
            . "Vaše korisničko ime: $korime\n\n"
            . "Vaša nova lozinka: $novaLozinka\n\n";
    $mail = new mail();
    // $mail->set_podaci($email, "Promjena lozinke", $poruka); // slanje mail-a 
    //return $mail->posaljiMail();

    /* // dio za promijenu lozinke u bazi
      $sql = "select sol from korisnik where korisnicko_ime = $korime;";
      $rs = $baza->selectDB($sql);
      $podaci = $rs->fetch_array();
      $kriptiranaLozinka = sha1($podaci['sol'] . "-" . $_POST["lozinka"]);
      $sql = "UPDATE korisnik SET lozinka = '" . $novaLozinka . "', lozinka_kriptirana = $kriptiranaLozinka WHERE korisnicko_ime = '" . $korime . "';"; // mjenja staru lozinku u novu
      $baza->updateDB($sql); */
}

function dohvatiIdKorisnik($korime) {
    $baza = new Baza();
    $baza->spojiDB();
    $sql = "select idkorisnik from korisnik where korisnicko_ime = '" . $korime . "'"; // dohvaca id korisnka
    $rs = $baza->selectDB($sql);
    $podaci = $rs->fetch_array();
    return $podaci['idkorisnik'];
}
