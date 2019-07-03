<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 17:50:03
         compiled from "stranice_predlosci\statistikaKorisnik.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217195b09a27b64d668-00139838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bb58fe62724789296f7709eef5e66fc668fdfcf' => 
    array (
      0 => 'stranice_predlosci\\statistikaKorisnik.tpl',
      1 => 1527868201,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217195b09a27b64d668-00139838',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b09a27b66b298_83834708',
  'variables' => 
  array (
    'ispisPotvrda' => 0,
    'slanje' => 0,
    'vrstaOglasa' => 0,
    'pretraga' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b09a27b66b298_83834708')) {function content_5b09a27b66b298_83834708($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['ispisPotvrda']->value;?>

<form class="formaUnos" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p> <label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
            <label for="vrstaOglasa">Vrsta oglasa: </label>
            <select id="vrstaOglasa" name="vrstaOglasa"><br/><br/>
                <?php echo $_smarty_tpl->tpl_vars['vrstaOglasa']->value;?>

             </select><br><br>    
             <label for="radio">Sortiraj po: </label><br/><br/>
             <input type="radio" name="radio" value="vise"> Više klikova
             <input type="radio" name="radio" value="manje"> Manje klikova<br><br>
            <input type="submit" class="button" value="Filtriraj">
    </form>
    <br><br><br><br>
    <?php echo $_smarty_tpl->tpl_vars['pretraga']->value;?>
<?php }} ?>
