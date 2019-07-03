<?php /* Smarty version Smarty-3.1.18, created on 2018-05-31 23:56:15
         compiled from "stranice_predlosci\pregledDnevnik.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126935b106cc20a32e3-13355073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed865b5469aff2f79c298cc395efe217f357dfae' => 
    array (
      0 => 'stranice_predlosci\\pregledDnevnik.tpl',
      1 => 1527803772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126935b106cc20a32e3-13355073',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b106cc20a3e39_63694284',
  'variables' => 
  array (
    'slanje' => 0,
    'pretraga' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b106cc20a3e39_63694284')) {function content_5b106cc20a3e39_63694284($_smarty_tpl) {?><script type="text/javascript" src="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.js"></script>             
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.css"/> 
<script src="./JS/dnevnikTable.js" type="text/javascript"></script> 
<form class="formaUnos" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
            <input type="submit" class="button" value="Filtriraj">          
    </form>
    <br><br><br><br>
    <?php echo $_smarty_tpl->tpl_vars['pretraga']->value;?>
<?php }} ?>
