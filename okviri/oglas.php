<?php

// staviti na registracija.php i index.php 
// prijava.php pozicija 1

include_once "./okviri/dohvatiVrijeme.php";

$sql1 = "SELECT oglas.putanja_do_slike, oglas.url, pozicija_oglasa.visina, pozicija_oglasa.sirina, vrsta_oglasa.brzina_izmjene, oglas.idoglas, vrsta_oglasa.idvrsta_oglasa, oglas.naziv, oglas.aktivan_od, vrsta_oglasa.trajanje_prikazivanja  from oglas, pozicija_oglasa, vrsta_oglasa where 
vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa and pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and oglas.status='prihvacen' and pozicija_oglasa.stranica='prijava.php' and pozicija_oglasa.broj_lokacije =1;";
$rs1 = $baza->selectDB($sql1);
$danasnjiDatum = date('Y-m-d H:i:s', virtualno_vrijeme());
$prijavaPoz1 = "";

$brojac = 0;
if (mysqli_num_rows($rs1) > 0) {
    while (list($putanja_slike, $url, $visina, $sirina, $brzina, $idoglas, $idvrstaOglasa, $naziv, $datum_od, $trajanje) = $rs1->fetch_array()) {
        $datum_do = date('Y-m-d H:i:s', strtotime($datum_od . " + $trajanje days"));
        if ($danasnjiDatum < $datum_do) {
            if (file_exists("./slike/oglasi/" . $putanja_slike)) {
                $brojac ++;
                $prijavaPoz1 .= "<a href='$url'><img name='" . $brzina . "," . $idoglas . "' class='oglasSlika1' hidden width='" . $visina . "' height='" . $sirina . "' src='./slike/oglasi/" . $putanja_slike . "'></a>";
            }
        }
    }
}
if (mysqli_num_rows($rs1) == 0 || $brojac == 0) {
    $upit = "SELECT vrsta_oglasa.cijena  from pozicija_oglasa, vrsta_oglasa where 
     pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and pozicija_oglasa.stranica='prijava.php' and pozicija_oglasa.broj_lokacije =1";
    $rs1 = $baza->selectDB($upit);
    $podaci = $rs1->fetch_array();
    $prijavaPoz1 .= "<h2 style=+text-align:center;'>Kupi oglas za " . $podaci["cijena"] . "kn</h2>";
}

$brojac = 0;
// prijava.php pozicija 2

$sql2 = "SELECT oglas.putanja_do_slike, oglas.url, pozicija_oglasa.visina, pozicija_oglasa.sirina, vrsta_oglasa.brzina_izmjene, oglas.idoglas, vrsta_oglasa.idvrsta_oglasa, oglas.naziv, oglas.aktivan_od, vrsta_oglasa.trajanje_prikazivanja   from oglas, pozicija_oglasa, vrsta_oglasa where 
vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa and pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and oglas.status='prihvacen' and pozicija_oglasa.stranica='prijava.php' and pozicija_oglasa.broj_lokacije =2;";
$rs2 = $baza->selectDB($sql2);

$prijavaPoz2 = "";
if (mysqli_num_rows($rs2) > 0) {
    while (list($putanja_slike, $url, $visina, $sirina, $brzina, $idoglas, $idvrstaOglasa, $naziv, $datum_od, $trajanje) = $rs2->fetch_array()) {
        $datum_do = date('Y-m-d H:i:s', strtotime($datum_od . " + $trajanje days"));
        if ($danasnjiDatum < $datum_do) {
            if (file_exists("./slike/oglasi/" . $putanja_slike)) {
                $brojac++;
                $prijavaPoz2 .= "<a href='$url'><img name='" . $brzina . "," . $idoglas . "' class='oglasSlika2' hidden width='" . $visina . "' height='" . $sirina . "' src='./slike/oglasi/" . $putanja_slike . "'></a>";
            }
        }
    }
}
if (mysqli_num_rows($rs1) == 0 || $brojac == 0) {
    $upit = "SELECT vrsta_oglasa.cijena  from pozicija_oglasa, vrsta_oglasa where 
     pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and pozicija_oglasa.stranica='prijava.php' and pozicija_oglasa.broj_lokacije =2";
    $rs2 = $baza->selectDB($upit);
    $podaci = $rs2->fetch_array();
    $prijavaPoz2 .= "<h2 style=+text-align:center;'>Kupi oglas za " . $podaci["cijena"] . "kn</h2>";
}

$brojac = 0;
// prijava.php pozicija 3

$sql3 = "SELECT oglas.putanja_do_slike, oglas.url, pozicija_oglasa.visina, pozicija_oglasa.sirina, vrsta_oglasa.brzina_izmjene, oglas.idoglas, vrsta_oglasa.idvrsta_oglasa, oglas.naziv, oglas.aktivan_od, vrsta_oglasa.trajanje_prikazivanja   from oglas, pozicija_oglasa, vrsta_oglasa where 
vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa and pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and oglas.status='prihvacen' and pozicija_oglasa.stranica='prijava.php' and pozicija_oglasa.broj_lokacije =3;";
$rs3 = $baza->selectDB($sql3);

$prijavaPoz3 = "";
if (mysqli_num_rows($rs3) > 0) {
    while (list($putanja_slike, $url, $visina, $sirina, $brzina, $idoglas, $idvrstaOglasa, $naziv, $datum_od, $trajanje) = $rs3->fetch_array()) {
        $datum_do = date('Y-m-d H:i:s', strtotime($datum_od . " + $trajanje days"));
        if ($danasnjiDatum < $datum_do) {
            $brojac ++;
            if (file_exists("./slike/oglasi/" . $putanja_slike)) {
                $prijavaPoz3 .= "<a href='$url'><img name='" . $brzina . "," . $idoglas . "' class='oglasSlika3' hidden width='" . $visina . "' height='" . $sirina . "' src='./slike/oglasi/" . $putanja_slike . "'></a>";
            }
        }
    }
}
if (mysqli_num_rows($rs1) == 0 || $brojac == 0) {
    $upit = "SELECT vrsta_oglasa.cijena  from pozicija_oglasa, vrsta_oglasa where 
     pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and pozicija_oglasa.stranica='prijava.php' and pozicija_oglasa.broj_lokacije =3";
    $rs3 = $baza->selectDB($upit);
    $podaci = $rs3->fetch_array();
    $prijavaPoz3 .= "<h2 style=+text-align:center;'>Kupi oglas za " . $podaci["cijena"] . "kn</h2>";
}

$brojac = 0;
// registracija.php pozicija 1

$sql1 = "SELECT oglas.putanja_do_slike, oglas.url, pozicija_oglasa.visina, pozicija_oglasa.sirina, vrsta_oglasa.brzina_izmjene, oglas.idoglas, vrsta_oglasa.idvrsta_oglasa, oglas.naziv, oglas.aktivan_od, vrsta_oglasa.trajanje_prikazivanja  from oglas, pozicija_oglasa, vrsta_oglasa where 
vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa and pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and oglas.status='prihvacen' and pozicija_oglasa.stranica='registracija.php' and pozicija_oglasa.broj_lokacije =1;";
$rs1 = $baza->selectDB($sql1);

$registracijaPoz1 = "";
if (mysqli_num_rows($rs1) > 0) {
    while (list($putanja_slike, $url, $visina, $sirina, $brzina, $idoglas, $idvrstaOglasa, $naziv, $datum_od, $trajanje) = $rs1->fetch_array()) {
        $datum_do = date('Y-m-d H:i:s', strtotime($datum_od . " + $trajanje days"));
        if ($danasnjiDatum < $datum_do) {
            $brojac++;
            if (file_exists("./slike/oglasi/" . $putanja_slike)) {
                $registracijaPoz1 .= "<a href='$url'><img name='" . $brzina . "," . $idoglas . "' class='oglasSlika1' hidden width='" . $visina . "' height='" . $sirina . "' src='./slike/oglasi/" . $putanja_slike . "'></a>";
            }
        }
    }
}
if (mysqli_num_rows($rs1) == 0 || $brojac == 0) {
    $upit = "SELECT vrsta_oglasa.cijena  from pozicija_oglasa, vrsta_oglasa where 
     pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and pozicija_oglasa.stranica='registracija.php' and pozicija_oglasa.broj_lokacije =1";
    $rs1 = $baza->selectDB($upit);
    $podaci = $rs1->fetch_array();
    $registracijaPoz1 .= "<h2 style=+text-align:center;'>Kupi oglas za " . $podaci["cijena"] . "kn</h2>";
}

$brojac = 0;
// registracija.php pozicija 2

$sql1 = "SELECT oglas.putanja_do_slike, oglas.url, pozicija_oglasa.visina, pozicija_oglasa.sirina, vrsta_oglasa.brzina_izmjene, oglas.idoglas, vrsta_oglasa.idvrsta_oglasa, oglas.naziv, oglas.aktivan_od, vrsta_oglasa.trajanje_prikazivanja  from oglas, pozicija_oglasa, vrsta_oglasa where 
vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa and pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and oglas.status='prihvacen' and pozicija_oglasa.stranica='registracija.php' and pozicija_oglasa.broj_lokacije =2;";
$rs1 = $baza->selectDB($sql1);

$registracijaPoz2 = "";
if (mysqli_num_rows($rs1) > 0) {
    while (list($putanja_slike, $url, $visina, $sirina, $brzina, $idoglas, $idvrstaOglasa, $naziv, $datum_od, $trajanje) = $rs1->fetch_array()) {
        $datum_do = date('Y-m-d H:i:s', strtotime($datum_od . " + $trajanje days"));
        if ($danasnjiDatum < $datum_do) {
            $brojac++;
            if (file_exists("./slike/oglasi/" . $putanja_slike)) {
                $registracijaPoz2 .= "<a href='$url'><img name='" . $brzina . "," . $idoglas . "' class='oglasSlika2' hidden width='" . $visina . "' height='" . $sirina . "' src='./slike/oglasi/" . $putanja_slike . "'></a>";
            }
        }
    }
}
if (mysqli_num_rows($rs1) == 0 || $brojac == 0) {
    $upit = "SELECT vrsta_oglasa.cijena  from pozicija_oglasa, vrsta_oglasa where 
     pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and pozicija_oglasa.stranica='registracija.php' and pozicija_oglasa.broj_lokacije =2";
    $rs1 = $baza->selectDB($upit);
    $podaci = $rs1->fetch_array();
    $registracijaPoz2 .= "<h2 style=+text-align:center;'>Kupi oglas za " . $podaci["cijena"] . "kn</h2>";
}

// index.php pozicija 1
$brojac = 0;

$sql1 = "SELECT oglas.putanja_do_slike, oglas.url, pozicija_oglasa.visina, pozicija_oglasa.sirina, vrsta_oglasa.brzina_izmjene, oglas.idoglas, vrsta_oglasa.idvrsta_oglasa, oglas.naziv, oglas.aktivan_od, vrsta_oglasa.trajanje_prikazivanja   from oglas, pozicija_oglasa, vrsta_oglasa where 
vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa and pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and oglas.status='prihvacen' and pozicija_oglasa.stranica='index.php' and pozicija_oglasa.broj_lokacije =1;";
$rs1 = $baza->selectDB($sql1);

$indexPoz1 = "";
if (mysqli_num_rows($rs1) > 0) {

    while (list($putanja_slike, $url, $visina, $sirina, $brzina, $idoglas, $idvrstaOglasa, $naziv, $datum_od, $trajanje) = $rs1->fetch_array()) {
        $datum_do = date('Y-m-d H:i:s', strtotime($datum_od . " + $trajanje days"));
        if ($danasnjiDatum < $datum_do) {
            if (file_exists("./slike/oglasi/" . $putanja_slike)) {
                $brojac++;
                $indexPoz1 .= "<a href='$url'><img name='" . $brzina . "," . $idoglas . "' class='oglasSlika1' hidden width='" . $visina . "' height='" . $sirina . "' src='./slike/oglasi/" . $putanja_slike . "'></a>";
            }
        }
    }
}
if (mysqli_num_rows($rs1) == 0 || $brojac == 0) {
    $upit = "SELECT vrsta_oglasa.cijena  from pozicija_oglasa, vrsta_oglasa where 
     pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and pozicija_oglasa.stranica='index.php' and pozicija_oglasa.broj_lokacije =1";
    $rs1 = $baza->selectDB($upit);
    $podaci = $rs1->fetch_array();
    $indexPoz1 .= "<h2 style=+text-align:center;'>Kupi oglas za " . $podaci["cijena"] . "kn</h2>";
}

$brojac = 0;
// index.php pozicija 2

$sql1 = "SELECT oglas.putanja_do_slike, oglas.url, pozicija_oglasa.visina, pozicija_oglasa.sirina, vrsta_oglasa.brzina_izmjene, oglas.idoglas, vrsta_oglasa.idvrsta_oglasa, oglas.naziv, oglas.aktivan_od, vrsta_oglasa.trajanje_prikazivanja   from oglas, pozicija_oglasa, vrsta_oglasa where 
vrsta_oglasa.idvrsta_oglasa = oglas.idvrsta_oglasa and pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and oglas.status='prihvacen' and pozicija_oglasa.stranica='index.php' and pozicija_oglasa.broj_lokacije =2;";
$rs1 = $baza->selectDB($sql1);

$indexPoz2 = "";
if (mysqli_num_rows($rs1) > 0) {
    while (list($putanja_slike, $url, $visina, $sirina, $brzina, $idoglas, $idvrstaOglasa, $naziv, $datum_od, $trajanje) = $rs1->fetch_array()) {
        $datum_do = date('Y-m-d H:i:s', strtotime($datum_od . " + $trajanje days"));
        if ($danasnjiDatum < $datum_do) {
            if (file_exists("./slike/oglasi/" . $putanja_slike)) {
                $brojac++;
                $indexPoz2 .= "<a href='$url'><img name='" . $brzina . "," . $idoglas . "' class='oglasSlika2' hidden width='" . $visina . "' height='" . $sirina . "' src='./slike/oglasi/" . $putanja_slike . "'></a>";
            }
        }
    }
}
if (mysqli_num_rows($rs1) == 0 || $brojac == 0) {
    $upit = "SELECT vrsta_oglasa.cijena  from pozicija_oglasa, vrsta_oglasa where 
     pozicija_oglasa.idpozicija_oglasa = vrsta_oglasa.idpozicija_oglasa and pozicija_oglasa.stranica='index.php' and pozicija_oglasa.broj_lokacije =2";
    $rs1 = $baza->selectDB($upit);
    $podaci = $rs1->fetch_array();
    $indexPoz2 .= "<h2 style=+text-align:center;'>Kupi oglas za " . $podaci["cijena"] . "kn</h2>";
}