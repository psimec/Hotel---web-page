<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 11:50:39
         compiled from "stranice_predlosci\rezervacijeSobe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62735b0be906d8dcf5-16640090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a2f5fb3801e19d5a3a0e2e121ceb41eb8ad0cd4' => 
    array (
      0 => 'stranice_predlosci\\rezervacijeSobe.tpl',
      1 => 1527846587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62735b0be906d8dcf5-16640090',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0be906d8e814_05854659',
  'variables' => 
  array (
    'greska' => 0,
    'uspjeh' => 0,
    'slanje' => 0,
    'sobe' => 0,
    'korisnici' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0be906d8e814_05854659')) {function content_5b0be906d8e814_05854659($_smarty_tpl) {?><script src="JS/rezervacijeSobe.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['greska']->value;?>

<?php echo $_smarty_tpl->tpl_vars['uspjeh']->value;?>

<form class="formaUnos"id="unesiRezervaciju" name="unesiRezervaciju" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><label for="broj_sobe">Trazena soba: </label>
            <select id="broj_sobe" name="broj_sobe">
                <?php echo $_smarty_tpl->tpl_vars['sobe']->value;?>

             </select><br><br> 
             <label for="korisnik">Korisnik: </label>
            <select id="korisnik" name="korisnik">
                <?php echo $_smarty_tpl->tpl_vars['korisnici']->value;?>

             </select><br><br> 
            <label for="trajanje">Trajanje u danima: </label>
            <input type="text"  id="trajanje" name="trajanje" size="3" maxlength="5"><br><br> 
            <label for="datum">Datum dolaska: </label>
            <input type="date"  id="datum" name="datum" size="50" maxlength="50"><br><br>    
            <label for="vrijeme">Vrijeme dolaska: </label>
            <input type="time"  id="vrijeme" name="vrijeme" size="50" maxlength="50"><br><br> 
            <input type="submit" class="button" value="Kreiraj rezervaciju">
    </form><?php }} ?>
