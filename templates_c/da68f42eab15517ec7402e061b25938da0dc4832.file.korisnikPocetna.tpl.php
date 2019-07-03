<?php /* Smarty version Smarty-3.1.18, created on 2018-06-03 20:31:05
         compiled from "stranice_predlosci\korisnikPocetna.tpl" */ ?>
<?php /*%%SmartyHeaderCode:281175b0975ecd8f341-98550450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da68f42eab15517ec7402e061b25938da0dc4832' => 
    array (
      0 => 'stranice_predlosci\\korisnikPocetna.tpl',
      1 => 1528050663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281175b0975ecd8f341-98550450',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0975ecd8fb63_95878579',
  'variables' => 
  array (
    'googleMap' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0975ecd8fb63_95878579')) {function content_5b0975ecd8fb63_95878579($_smarty_tpl) {?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<div class="index">
<h2 style="margin-left: 48%;">Hoteli ?</h2>
<hr width="30%">
<p style="margin-left: 15%;">Mogućnosti pregleda najboljih, najluksuznijih i najjeftinijih hotela u Hrvatskoj, također pregled svih pripadajućih soba s detaljnim opisom</p>
<br>
<h2 style="margin-left: 46%;">Rezervacije ?</h2>
<hr width="30%">
<p style="margin-left: 17%;">Rezervirajte baš onu sobu koju želite! Stranica omogućuje pretraživanje soba na različite načine uz vizualni prikaz svake sobe!</p>
<br>
<h2 style="margin-left: 48%;">Oglasi ?</h2>
<hr width="30%">
<p style="margin-left: 23%;">Imate Web stranicu koja nije popularna? Želite reklamirati svoj proizvod? Došli se na pravo mjesto!</p>
<br></div>
<?php echo $_smarty_tpl->tpl_vars['googleMap']->value;?>
<?php }} ?>
