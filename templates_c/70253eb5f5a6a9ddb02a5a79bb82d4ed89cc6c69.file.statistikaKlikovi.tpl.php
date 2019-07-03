<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 11:42:24
         compiled from "stranice_predlosci\statistikaKlikovi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18405b0e85dcc4a594-77500052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70253eb5f5a6a9ddb02a5a79bb82d4ed89cc6c69' => 
    array (
      0 => 'stranice_predlosci\\statistikaKlikovi.tpl',
      1 => 1527846070,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18405b0e85dcc4a594-77500052',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0e85dcc6c883_62812471',
  'variables' => 
  array (
    'ispisPotvrda' => 0,
    'slanje' => 0,
    'korisnici' => 0,
    'pretraga' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0e85dcc6c883_62812471')) {function content_5b0e85dcc6c883_62812471($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['ispisPotvrda']->value;?>

<script type="text/javascript" src="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.js"></script>             
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.css"/> 
<script src="./JS/klikoviTable.js" type="text/javascript"></script> 
<form class="formaUnos" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p> <label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
            <label for="vrstaOglasa">Vlasnik ogalasa: </label>
            <select id="korisnici" name="korisnici">
                <?php echo $_smarty_tpl->tpl_vars['korisnici']->value;?>

             </select><br><br>    
            <input type="submit" class="button" value="Filtriraj">
            <a class="button" target="_blank" href="./okviri/grafovi.php?graf=korisniciKlik">Prikazi graf</a>
    </form>
    <br><br><br><br>
    <?php echo $_smarty_tpl->tpl_vars['pretraga']->value;?>
<?php }} ?>
