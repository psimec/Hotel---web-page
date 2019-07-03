<?php /* Smarty version Smarty-3.1.18, created on 2018-06-02 16:53:35
         compiled from "stranice_predlosci\sobaPrikaz.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144225b08849b2b0848-13229417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04f8b9a9008cc6c2804fcfd6df4b3b9f063f37b5' => 
    array (
      0 => 'stranice_predlosci\\sobaPrikaz.tpl',
      1 => 1527951210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144225b08849b2b0848-13229417',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b08849b2cc501_73183015',
  'variables' => 
  array (
    'opisSobe' => 0,
    'potvrda' => 0,
    'slanje' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b08849b2cc501_73183015')) {function content_5b08849b2cc501_73183015($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['opisSobe']->value;?>

<?php echo $_smarty_tpl->tpl_vars['potvrda']->value;?>

<br/><br/> 
<form class="formaUnos" id="rezervacijaSobe" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><label for="naslov">Naslov poruke: </label>
            <input type="naslov" id="naslov" name="naslov" size="20" maxlength="20"><br><br>
            <label for="sadrzaj">Sadržaj poruke: </label>
            <input type="sadrzaj" id="sadrzaj" size="30" name="sadrzaj" maxlength="100"><br><br>          
            <input type="submit" class="button" value=" Pošalji rezervaciju">
    </form>  
        <?php }} ?>
