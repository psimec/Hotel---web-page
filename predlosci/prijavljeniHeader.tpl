<!DOCTYPE html>
<html>
    <head>
        <title>Hoteli</title>
        <meta charset="utf-8"/>
        <meta name="title" content="Projekt"/>
        <meta name="date" content="2018-05-14" />
        <meta name="author" content="Paskal Šimec"/>
        <link href="CSS/basic.css" rel="stylesheet" type="text/css"/>
        <script src="JS/kolacic.js" type="text/javascript"></script> 
        <script src="JS/google_translate.js" type="text/javascript"></script> 
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </head>
    <body>
        <header>
            <div class="zaglavlje">
                <img style="width: 7%; margin-top: -5px; right: 3px;" src="./slike/logo.PNG">
                <h1>{$naslov}</h1>                
                <p>
                    <span>Pozdrav, <a class="navLinkovi" href="urediKorisnik.php">{$pozdravKorisniku}<a></span>
                <br/><a class="navLinkovi" href="./okviri/odjava.php">Odjava</a></p>             
            </div>
        </header>
        <div style="clear: both;">
            <br/> 
        </div>
                <section id="nav">
            <ul >
                <div class="prijavljeni">
                    <li><a href="korisniciPocetna.php">Početna stranica</a></li>
                    <div class="dropdown">
                        <li><a class="dropbtn">Oglasi</a></li>
                        <div class="dropdown-content">
                            <a href="kreirajOglas.php">Kreiraj oglas</a>
                            <a href="mojiOglasi.php">Moji oglasi</a>
                            <a href="blokiranjeOglasa.php">Blokiranje oglasa</a>
                            <a href="statistikaKorisnik.php">Statistika mojih oglasa</a>
                        </div>
                    </div>
                    </div>
                    <div class="moderator" {$korisnik}> 
                    <div class="dropdown">
                        <li><a class="dropbtn">Hoteli</a></li>
                        <div class="dropdown-content">
                            <a href="mojiHoteli.php">Moji hoteli</a>
                            <a href="kreirajSobu.php" >Kreiraj sobu</a>
                            <a href="rezervacijeSobe.php">Kreiraj rezervaciju</a>
                        </div>
                    </div>
                    <li><a href="kreirajVrstuOglasa.php">Kreiraj vrstu oglasa</a></li>
                     <div class="dropdown" >
                        <li><a class="dropbtn">Zahtjevi</a></li>
                        <div class="dropdown-content">
                            <a href="zahtjeviZaOglasavanje.php">Oglašavanje oglasa</a>
                            <a href="zahtjeviZaBlokiranjeOglasa.php">Blokiranje oglasa</a> 
                        </div>
                    </div> 
                    </div>
                <div class="admin" {$korisnik} {$moderator}>
                <div class="dropdown">
                    <li><a class="dropbtn">Kreiraj</a></li>
                    <div class="dropdown-content">
                        <a href="kreirajModeratora.php">Kreiraj moderatora</a>
                        <a href="kreirajPozicijuOglasa.php">Kreiraj poziciju oglasa</a>
                        <a href="urediPozicijuOglasa.php">Uredi poziciju oglasa</a>
                        <a href="kreirajHotel.php">Kreiraj hotel</a>                     
                    </div>
                </div> 
                <div class="dropdown">
                    <li><a class="dropbtn">Upravljanje</a></li>
                    <div class="dropdown-content">
                        <a href="pregledDnevnik.php">Dnevnik rada</a>
                        <a href="virtualnoVrijeme.php">Virtualno vrijeme</a>
                        <a href="upravljanjeKorisnicima.php">Upravljanje korisnicima</a>
                    </div>
                </div>

                <div class="dropdown">
                    <li><a class="dropbtn">Statistika</a></li>
                    <div class="dropdown-content">
                        <a href="statistikaKlikovi.php">Klikovi oglasa</a>
                        <a href="statistikaPlaceniOglasi.php" >Plaćeni oglasi</a>
                        <a href="statistikaTopKorisnici.php">Top korisnici</a>
                    </div>
                </div>  
                    </div>
                </ul> 
                    </section>
        <div style="clear: left;">
            <br/> 
        </div>
        <br><br> 