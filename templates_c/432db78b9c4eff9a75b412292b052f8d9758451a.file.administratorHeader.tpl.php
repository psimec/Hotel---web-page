<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 18:39:14
         compiled from "predlosci\administratorHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25725b0dc009a26041-74139876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '432db78b9c4eff9a75b412292b052f8d9758451a' => 
    array (
      0 => 'predlosci\\administratorHeader.tpl',
      1 => 1527871146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25725b0dc009a26041-74139876',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0dc009a48292_46969492',
  'variables' => 
  array (
    'naslov' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0dc009a48292_46969492')) {function content_5b0dc009a48292_46969492($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Hoteli</title>
        <meta charset="utf-8"/>
        <meta name="title" content="Projekt"/>
        <meta name="date" content="2018-05-14" />
        <meta name="author" content="Paskal Šimec"/>
        <link href="CSS/basic.css" rel="stylesheet" type="text/css"/>
        <script src="JS/kolacic.js" type="text/javascript"></script>       
    </head>
    <body>
        <header>
            <div class="zaglavlje">
                <img style="width: 7%; margin-top: -5px; right: 3px;" src="./slike/logo.PNG">
                <h1><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</h1>
                <p><br/><a class="navLinkovi" href="./okviri/odjava.php">Odjava</a></p>             
            </div>
        </header>
        <div style="clear: both;">
            <br/> 
        </div>
        <div id="nav">
            <ul>
                <li><a href="administratorPocetna.php">Početna stranica</a></li> 
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
            </ul>  
        </div>
        <div style="clear: left;">
            <br/> 
        </div>
        <br><br> <?php }} ?>
