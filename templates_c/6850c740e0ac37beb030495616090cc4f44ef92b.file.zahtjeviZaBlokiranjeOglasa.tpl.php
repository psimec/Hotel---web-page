<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 17:26:50
         compiled from "stranice_predlosci\zahtjeviZaBlokiranjeOglasa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:309625b0bfe643c6fe5-48414968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6850c740e0ac37beb030495616090cc4f44ef92b' => 
    array (
      0 => 'stranice_predlosci\\zahtjeviZaBlokiranjeOglasa.tpl',
      1 => 1527866776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309625b0bfe643c6fe5-48414968',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0bfe643c7962_32684635',
  'variables' => 
  array (
    'ispisPotvrda' => 0,
    'oglasi' => 0,
    'slanje' => 0,
    'akcijaOglas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0bfe643c7962_32684635')) {function content_5b0bfe643c7962_32684635($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['ispisPotvrda']->value;?>

<?php echo $_smarty_tpl->tpl_vars['oglasi']->value;?>

<form class="formaUnos" id="zahtjeviBlokiranjeOglasa" novalidate method="post" enctype="multipart/form-data" action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
<input type="salji" id="posalji" name='posalji' hidden>
    <?php echo $_smarty_tpl->tpl_vars['akcijaOglas']->value;?>

<input type="submit" class="button" value="Unesi promijene">
</form><?php }} ?>
