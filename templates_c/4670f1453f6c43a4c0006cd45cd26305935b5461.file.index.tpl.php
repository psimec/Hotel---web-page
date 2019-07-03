<?php /* Smarty version Smarty-3.1.18, created on 2018-06-03 20:31:36
         compiled from "stranice_predlosci\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210555b096ed27bb2c4-15104401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4670f1453f6c43a4c0006cd45cd26305935b5461' => 
    array (
      0 => 'stranice_predlosci\\index.tpl',
      1 => 1528050693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210555b096ed27bb2c4-15104401',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b096ed27e4ab2_82148524',
  'variables' => 
  array (
    'indexPoz1' => 0,
    'indexPoz2' => 0,
    'googleMap' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b096ed27e4ab2_82148524')) {function content_5b096ed27e4ab2_82148524($_smarty_tpl) {?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/timer.js" type="text/javascript"></script> 
<div class='lijevo_oglas_index'><?php echo $_smarty_tpl->tpl_vars['indexPoz1']->value;?>
</div><div class='desno_oglas_index'><?php echo $_smarty_tpl->tpl_vars['indexPoz2']->value;?>
</div>
<br><br><br>
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
