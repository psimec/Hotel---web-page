<?php /* Smarty version Smarty-3.1.18, created on 2018-06-02 20:54:08
         compiled from "stranice_predlosci\virtualnoVrijeme.tpl" */ ?>
<?php /*%%SmartyHeaderCode:260005b0e7cf4872238-26417859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '054b487198fc51386bb2f62206d15dec9c5ca414' => 
    array (
      0 => 'stranice_predlosci\\virtualnoVrijeme.tpl',
      1 => 1527965647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '260005b0e7cf4872238-26417859',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0e7cf4872ed1_61842105',
  'variables' => 
  array (
    'prikaziStvarno' => 0,
    'prikaziVirtualno' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0e7cf4872ed1_61842105')) {function content_5b0e7cf4872ed1_61842105($_smarty_tpl) {?><div style="margin-left: 37%;">
<a class="button" target="_blank" href="http://barka.foi.hr/WebDiP/pomak_vremena/vrijeme.html">Odaberi broj sati</a>
<a class="button" href="./okviri/dohvatiVrijeme.php?data=vrijeme">Dohvati vrijeme</a><br/><br/><br/><br/>
</div>
<h3 style="margin-left: 37%;">
<?php echo $_smarty_tpl->tpl_vars['prikaziStvarno']->value;?>
<br/>
<?php echo $_smarty_tpl->tpl_vars['prikaziVirtualno']->value;?>
</h3></

<?php }} ?>
