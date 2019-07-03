<?php

include_once '../klase/baza.class.php';
$baza = new Baza();
$baza->spojiDB();

if (isset($_POST["korisnik"])) {
    $korime = $_POST["korisnik"];
    $sql = "SELECT idkorisnik FROM korisnik WHERE korisnicko_ime='" . $korime . "';";
    $rs = $baza->selectDB($sql);
    $podaci = $rs->fetch_array();
    echo $podaci["idkorisnik"];
}

if (isset($_POST["idOglas"])) {
    $idOglas = $_POST["idOglas"];
    $upit = "INSERT INTO klik VALUES (null, default, " . $idOglas . ");";
    $baza->updateDB($upit);
}

if (isset($_POST["idPozicija"])) {
    $idPozicija = $_POST["idPozicija"];
    $sql = "SELECT visina, sirina FROM pozicija_oglasa WHERE idpozicija_oglasa = $idPozicija";
    $rs = $baza->selectDB($sql);
    $podaci = $rs->fetch_array();
    echo $podaci["visina"].",".$podaci["sirina"];
}


