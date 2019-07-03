<?php /* Smarty version Smarty-3.1.18, created on 2018-06-02 01:30:13
         compiled from "stranice_predlosci\kreirajHotel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:280105b0dc061154b28-85570602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19b45c83382f12c5becabc5e869beba312a36a1d' => 
    array (
      0 => 'stranice_predlosci\\kreirajHotel.tpl',
      1 => 1527895753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280105b0dc061154b28-85570602',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0dc061155364_14017346',
  'variables' => 
  array (
    'greska' => 0,
    'uspjeh' => 0,
    'slanje' => 0,
    'brojModeratora' => 0,
    'moderatori' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0dc061155364_14017346')) {function content_5b0dc061155364_14017346($_smarty_tpl) {?><script src="JS/kreirajHotel.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['greska']->value;?>

<?php echo $_smarty_tpl->tpl_vars['uspjeh']->value;?>

<form class="formaUnos"id="kreirajHotel" enctype="multipart/form-data" name="kreirajHotel" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><input  type="hidden" name="MAX_FILE_SIZE" value="30000">            
            Postavi sliku hotela: <input id="userfile" name="userfile" type="file"><br><br> 
            <label for="moderator">Moderator: </label>
            <select id="moderator" multiple="multiple" name="moderator[]" size="<?php echo $_smarty_tpl->tpl_vars['brojModeratora']->value;?>
">
                <?php echo $_smarty_tpl->tpl_vars['moderatori']->value;?>

             </select><br><br> 
            <label for="naziv">Naziv: </label>
            <input type="text"  id="naziv" name="naziv" size="30" maxlength="30"><br><br> 
            <label for="ulica">Ulica: </label>
            <input type="text"  id="ulica" name="ulica" size="30" maxlength="30"><br><br>
            <label for="grad">Grad: </label>
            <input type="text"  id="grad" name="grad" size="30" maxlength="30"><br><br>
            <label for="drzava">Drzava: </label>
            <input type="text"  id="drzava" name="drzava" size="30" maxlength="30"><br><br>
            <label for="oib">OIB: </label>
            <input type="text"  id="oib" name="oib" size="30" maxlength="30"><br><br>
            <label for="telefon">Telefon: </label>
            <input type="text"  id="telefon" name="telefon" size="30" maxlength="30"><br><br>
            <label for="email">Email: </label>
            <input type="text"  id="email" name="email" size="30" maxlength="30"><br><br>
            <label for="zvjezdice">Broj zvjezdica: </label>
            <input type="text"  id="zvjezdice" name="zvjezdice" size="4" maxlength="1"><br><br>
            <label for="opis">Opis </label>
            <input type="text"  id="opis" name="opis" size="40" maxlength="40"><br><br>
            <input type="submit" class="button" value="Kreiraj hotel">
    </form><?php }} ?>
