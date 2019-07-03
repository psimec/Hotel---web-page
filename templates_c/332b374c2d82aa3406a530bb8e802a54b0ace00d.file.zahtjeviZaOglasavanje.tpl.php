<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 17:28:16
         compiled from "stranice_predlosci\zahtjeviZaOglasavanje.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144215b0b0e6212c640-95842933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '332b374c2d82aa3406a530bb8e802a54b0ace00d' => 
    array (
      0 => 'stranice_predlosci\\zahtjeviZaOglasavanje.tpl',
      1 => 1527866893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144215b0b0e6212c640-95842933',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0b0e6212d0c2_97677265',
  'variables' => 
  array (
    'ispisPotvrda' => 0,
    'slanje' => 0,
    'oglasi' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0b0e6212d0c2_97677265')) {function content_5b0b0e6212d0c2_97677265($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['ispisPotvrda']->value;?>

<form id="aktivacijaOglasa" name="blokiranjeOglasa" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
<input type="salji" id="posalji" name='posalji' hidden>
<?php echo $_smarty_tpl->tpl_vars['oglasi']->value;?>

    </form>
    <br><br><br><br><?php }} ?>
