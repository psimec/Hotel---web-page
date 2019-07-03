<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 11:42:37
         compiled from "stranice_predlosci\statistikaPlaceniOglasi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304205b0ec92b6acf46-70041111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdb7e70894bc7d9c49572f392e2130c645bc0772' => 
    array (
      0 => 'stranice_predlosci\\statistikaPlaceniOglasi.tpl',
      1 => 1527845880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304205b0ec92b6acf46-70041111',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0ec92b6ad8d0_94646673',
  'variables' => 
  array (
    'ispisPotvrda' => 0,
    'slanje' => 0,
    'pretraga' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0ec92b6ad8d0_94646673')) {function content_5b0ec92b6ad8d0_94646673($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['ispisPotvrda']->value;?>

<form class="formaUnos" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
            <label for="nacin">Filtriraj po: </label>
            <input type="radio" name="nacin" value="vrsta"> Vrsta oglasa
            <input type="radio" name="nacin" value="pozicija"> Pozicija oglasa<br><br> 
            <input type="submit" class="button" value="Filtriraj">
            <a class="button" target="_blank" href="./okviri/grafovi.php?graf=placeniOglasi">Prikazi graf</a>
    </form>
    <br><br><br><br>
    <?php echo $_smarty_tpl->tpl_vars['pretraga']->value;?>
<?php }} ?>
