<?php /* Smarty version Smarty-3.1.18, created on 2018-06-02 21:01:37
         compiled from "predlosci\nePrijavljeniHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322965b05c16aa176a2-31137157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0496d4830fd9dc14c5f53a3d5ff7b486cc8be38d' => 
    array (
      0 => 'predlosci\\nePrijavljeniHeader.tpl',
      1 => 1527966016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322965b05c16aa176a2-31137157',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b05c16ac9da50_47815565',
  'variables' => 
  array (
    'naslov' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b05c16ac9da50_47815565')) {function content_5b05c16ac9da50_47815565($_smarty_tpl) {?><!DOCTYPE html>
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
            <img style="width: 7%; margin-top: -5px; right: 3px;" src="./slike/logo.PNG">
            <div class="zaglavlje">
                <h1><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</h1>
                <p>
                <br/><a class="navLinkovi" href="./prijava.php">Prijava</a></br><a class="navLinkovi" href="./registracija.php">Registracija</a></p>              
            </div>
        </header>
        <div style="clear: both;">
            <br/> 
        </div>
        <div id="nav">
            <ul>
                <li><a href="index.php">Početna stranica</a></li>
                <li><a href="hoteli.php">Hoteli</a></li>
                <li><a href="sobe.php">Sobe</a></li>
                <li><a href="o_autoru.html">O autoru</a></li> 
                <li><a href="dokumentacija.html">Dokumentacija</a></li>
            </ul>  
        </div>
        <div style="clear: left;">
            <br/> 
        </div>
        <br><br> <?php }} ?>
