<?php

/* prikaz virtualnog vremena
 include_once "dohvatiVrijeme.php";
dohvati();
sinkroniziraj();

$vrijeme_servera = time();
$vrijeme_sustava = virtualno_vrijeme();
echo "Stvarno vrijeme servera: " . date('d.m.Y H:i:s',$vrijeme_servera) . "<br>";
echo "Virtualno vrijeme sustava: " . date('d.m.Y H:i:s',$vrijeme_sustava) . "<br>";
 */


function dohvati() {
    include_once '../klase//dnevnik.php';
    dnevnik::ostalo("", "", "pomak vremena");
    $url = "http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format=xml";
    $xml = file_get_contents($url);
    $dom = new DOMDocument();
    $dom->loadXml($xml);
    $fh = fopen("zapisPrivremeno.php", "w");
    $params = $dom->getElementsByTagName('brojSati');
    $pomak = $params->item(0)->nodeValue;
    $string = '<?php
    return ' . $pomak . ';
    ';
    fwrite($fh, $string);
    fclose($fh);
}

function sinkroniziraj() {
    $vrijeme = require "zapisPrivremeno.php";

    $fileStream = fopen("zapisVrijeme.php", "w");
    $string = '<?php return ' . $vrijeme . ';
    ';

    fwrite($fileStream, $string);
    fclose($fileStream);
}

function virtualno_vrijeme() {
    $pomak = require "zapisVrijeme.php";
    $pomak = $pomak * 3600;
    return time() + $pomak;
}

if (isset($_GET['data'])) {
    if ($_GET['data'] == "vrijeme") {
        dohvati();
        sinkroniziraj();
    }
    header("Location: ../virtualnoVrijeme.php");
}
?>