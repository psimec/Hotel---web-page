<?php

include "../klase/piegraph.class.php";

include '../klase//baza.class.php';

function korisniciPie() {
    $baza = new Baza();
    $baza->spojiDB();
    $korisnici = array();
    $korisnikVrijednost = array();
    $data = array();

    $sumaKlik = 0;

    $upit = "select count(klik.idoglas), korisnik.korisnicko_ime from oglas left join  klik on oglas.idoglas = klik.idoglas
        join korisnik on korisnik.idkorisnik = oglas.idkorisnik
         group by 2;";

    $rs = $baza->selectDB($upit);
    while (list($klik, $korime) = $rs->fetch_array()) {
        if ($klik == 0) {
            continue;
        }
        array_push($korisnici, $korime);
        array_push($korisnikVrijednost, $klik);
        $sumaKlik += $klik;
    }

    for ($i = 0; $i < count($korisnici); $i++) {
        $data[$i] = $korisnikVrijednost[$i] / $sumaKlik;
    }

    $pie = new PieGraph(400, 400, $data);
    $pie->setLegends($korisnici);
    $pie->set3dHeight(15);
    header("Content-type: image/png");
    $pie->display();
}

function topKorisnici() {
    $baza = new Baza();
    $baza->spojiDB();
    $korisnici = array();
    $korisnikVrijednost = array();
    $data = array();

    $sumaOglasa = 0;

    $upit = "select count(oglas.idoglas), korisnik.korisnicko_ime from oglas left join  korisnik on oglas.idkorisnik = korisnik.idkorisnik 
            where oglas.idkorisnik = korisnik.idkorisnik 
            group by 2  order by 1 desc;";

    $rs = $baza->selectDB($upit);
    while (list($brojOglasa, $korime) = $rs->fetch_array()) {
        if ($brojOglasa == 0) {
            continue;
        }
        array_push($korisnici, $korime);
        array_push($korisnikVrijednost, $brojOglasa);
        $sumaOglasa += $brojOglasa;
    }

    for ($i = 0; $i < count($korisnici); $i++) {
        $data[$i] = $korisnikVrijednost[$i] / $sumaOglasa;
    }

    $pie = new PieGraph(400, 400, $data);
    $pie->setLegends($korisnici);
    $pie->set3dHeight(15);
    header("Content-type: image/png");
    $pie->display();
}

function placaniOglasi() {
    $baza = new Baza();
    $baza->spojiDB();
    $oglasa = array();
    $oglasVrijednost = array();
    $data = array();

    $sumaOglasa = 0;

    $upit = "select count(oglas.idoglas), vrsta_oglasa.idvrsta_oglasa from oglas left join vrsta_oglasa
                on vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa where vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa group by 2 order by 1 desc";

    $rs = $baza->selectDB($upit);
    while (list($brojOglasa, $idvrsta) = $rs->fetch_array()) {
        if ($brojOglasa == 0) {
            continue;
        }
        array_push($oglasa, "Broj: ".$idvrsta);
        array_push($oglasVrijednost, $brojOglasa);
        $sumaOglasa += $brojOglasa;
    }

    for ($i = 0; $i < count($oglasa); $i++) {
        $data[$i] = $oglasVrijednost[$i] / $sumaOglasa;
    }

    $pie = new PieGraph(400, 400, $data);
    $pie->setLegends($oglasa);
    $pie->set3dHeight(15);
    header("Content-type: image/png");
    $pie->display();
}

if (isset($_GET["graf"])) {
    if ($_GET["graf"] == "korisniciKlik") {
        korisniciPie();
    } elseif ($_GET["graf"] == "topKorisnici") {
        topKorisnici();
    } elseif ($_GET["graf"] == "placeniOglasi") {
        placaniOglasi();
    }
}
