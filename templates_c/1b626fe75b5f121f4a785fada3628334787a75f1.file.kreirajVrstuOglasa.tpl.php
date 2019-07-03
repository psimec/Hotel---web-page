<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 11:46:26
         compiled from "stranice_predlosci\kreirajVrstuOglasa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157815b0c26b2828499-02538093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b626fe75b5f121f4a785fada3628334787a75f1' => 
    array (
      0 => 'stranice_predlosci\\kreirajVrstuOglasa.tpl',
      1 => 1527846298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157815b0c26b2828499-02538093',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0c26b2828ea4_54163318',
  'variables' => 
  array (
    'greska' => 0,
    'uspjeh' => 0,
    'slanje' => 0,
    'pozicije' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0c26b2828ea4_54163318')) {function content_5b0c26b2828ea4_54163318($_smarty_tpl) {?><script src="JS/kreiranjeVrstiOglasa.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['greska']->value;?>

<?php echo $_smarty_tpl->tpl_vars['uspjeh']->value;?>

<form class="formaUnos"id="unesiVrstuOglasa" name="unesiVrstuOglasa" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><label for="broj_sobe">Pozicija oglasa: </label>
            <select id="id_pozicija" name="id_pozicija">
                <?php echo $_smarty_tpl->tpl_vars['pozicije']->value;?>

             </select><br><br> 
            <label for="trajanje">Trajanje u danima: </label>
            <input type="text"  id="trajanje" name="trajanje" size="3" maxlength="5"><br><br> 
            <label for="brzina_izmjene">Brzina u sekundama: </label>
            <input type="text"  id="brzina_izmjene" name="brzina_izmjene" size="3" maxlength="5"><br><br> 
            <label for="cijena">Cijena oglasa: </label>
            <input type="text"  id="cijena" name="cijena" size="3" maxlength="5"><br><br> 
            <input type="submit" class="button" value="Kreiraj vrstu oglasa">
    </form><?php }} ?>
