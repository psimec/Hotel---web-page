<?php /* Smarty version Smarty-3.1.18, created on 2018-06-02 00:51:56
         compiled from "predlosci\moderatorHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120565b0ab3f2186827-60515193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5282bfb144e905a7bbaaf2ed157c349d76b9391b' => 
    array (
      0 => 'predlosci\\moderatorHeader.tpl',
      1 => 1527892757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120565b0ab3f2186827-60515193',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0ab3f21ab4f7_03848936',
  'variables' => 
  array (
    'naslov' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0ab3f21ab4f7_03848936')) {function content_5b0ab3f21ab4f7_03848936($_smarty_tpl) {?><!DOCTYPE html>
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
                <div class="moderator">
                    <li><a href="moderatorPocetna.php">Početna stranica</a></li>   
                    <div class="dropdown">
                        <li><a class="dropbtn">Hoteli</a></li>
                        <div class="dropdown-content">
                            <a href="mojiHoteli.php">Moji hoteli</a>
                            <a href="kreirajSobu.php" >Kreiraj sobu</a>
                            <a href="rezervacijeSobe.php">Kreiraj rezervaciju</a>
                        </div>
                    </div>
                    <li><a href="kreirajVrstuOglasa.php">Kreiraj vrstu oglasa</a></li>
                     <div class="dropdown">
                        <li><a class="dropbtn">Zahtjevi</a></li>
                        <div class="dropdown-content">
                            <a href="zahtjeviZaOglasavanje.php">Oglašavanje oglasa</a>
                            <a href="zahtjeviZaBlokiranjeOglasa.php">Blokiranje oglasa</a> 
                        </div>
                    </div> 
                    </div>
                </ul>  
            
        </div>
        <div style="clear: left;">
            <br/> 
        </div>
        <br><br> <?php }} ?>
