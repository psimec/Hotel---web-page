<?php /* Smarty version Smarty-3.1.18, created on 2018-06-03 20:35:23
         compiled from "predlosci\prijavljeniHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6525b0975ecd2bfd4-80685157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4dc48571fd5d0641039d80a6a96629d7abae459' => 
    array (
      0 => 'predlosci\\prijavljeniHeader.tpl',
      1 => 1528050921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6525b0975ecd2bfd4-80685157',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0975ecd4cad5_98487865',
  'variables' => 
  array (
    'naslov' => 0,
    'pozdravKorisniku' => 0,
    'korisnik' => 0,
    'moderator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0975ecd4cad5_98487865')) {function content_5b0975ecd4cad5_98487865($_smarty_tpl) {?><!DOCTYPE html>
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
                <h1><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</h1>                
                <p>
                    <span>Pozdrav, <a class="navLinkovi" href="urediKorisnik.php"><?php echo $_smarty_tpl->tpl_vars['pozdravKorisniku']->value;?>
<a></span>
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
                    <div class="moderator" <?php echo $_smarty_tpl->tpl_vars['korisnik']->value;?>
> 
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
                <div class="admin" <?php echo $_smarty_tpl->tpl_vars['korisnik']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['moderator']->value;?>
>
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
        <br><br> <?php }} ?>
