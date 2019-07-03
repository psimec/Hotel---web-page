<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 18:29:52
         compiled from "stranice_predlosci\upravljanjeKorisnicima.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184595b0dd34c6fd555-80862023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ca5853e179d48d01de4eb2e2dbe7db451ec9ab8' => 
    array (
      0 => 'stranice_predlosci\\upravljanjeKorisnicima.tpl',
      1 => 1527870590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184595b0dd34c6fd555-80862023',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0dd34c6fdfe9_61001932',
  'variables' => 
  array (
    'slanje' => 0,
    'svaKorimena' => 0,
    'sviKorisnici' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0dd34c6fdfe9_61001932')) {function content_5b0dd34c6fdfe9_61001932($_smarty_tpl) {?><script type="text/javascript" src="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.js"></script>             
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.css"/> 
<script src="./JS/korisniciTable.js" type="text/javascript"></script> 
<script src="./JS/obrisiKolacic.js" type="text/javascript"></script> 
<form class="formaUnos" id="zahtjeviBlokiranjeOglasa" novalidate method="post" enctype="multipart/form-data" action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
<label for="moderator">Postavi status korisnika: </label><br>
<select id="korisnik" name="korisnik">
<?php echo $_smarty_tpl->tpl_vars['svaKorimena']->value;?>

</select><br><br>
  <input type="radio" name="status" value="normalan"> Normalan
  <input type="radio" name="status" value="blokiran"> Blokiran<br><br> 
<input type="salji" id="posalji" name='posalji' hidden>
<input type="submit" class="button" value="Unesi promijene">
<input onclick="obrisiCookie()" size="23" class="button" value="Resetiraj uvjete korištenja">
</form>
<?php echo $_smarty_tpl->tpl_vars['sviKorisnici']->value;?>
<?php }} ?>
