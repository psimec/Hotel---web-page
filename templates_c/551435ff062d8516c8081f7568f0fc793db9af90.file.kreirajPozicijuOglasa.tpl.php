<?php /* Smarty version Smarty-3.1.18, created on 2018-06-02 01:28:54
         compiled from "stranice_predlosci\kreirajPozicijuOglasa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:294395b0e749c8ff627-24766900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '551435ff062d8516c8081f7568f0fc793db9af90' => 
    array (
      0 => 'stranice_predlosci\\kreirajPozicijuOglasa.tpl',
      1 => 1527895731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '294395b0e749c8ff627-24766900',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0e749c9011a6_40832649',
  'variables' => 
  array (
    'greska' => 0,
    'uspjeh' => 0,
    'slanje' => 0,
    'moderatori' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0e749c9011a6_40832649')) {function content_5b0e749c9011a6_40832649($_smarty_tpl) {?><script src="JS/kreirajPozicijuOglasa.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['greska']->value;?>

<?php echo $_smarty_tpl->tpl_vars['uspjeh']->value;?>

<form class="formaUnos"id="kreirajPozicijuOglasa" enctype="multipart/form-data" name="kreirajHotel" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p> <label for="moderator">Moderator: </label>
            <select id="moderator" name="moderator">
                <?php echo $_smarty_tpl->tpl_vars['moderatori']->value;?>

             </select><br><br> 
             <label for="stranica">Stranica: </label>
             <select id="stranica" name="stranica">
                <option selected="selected" >== Odaberi stranicu ==</option>
                <option >prijava.php</option>
                <option >registracija.php</option>
                <option>index.php</option>                
             </select><br><br> 
            <label for="lokacija">Broj lokacije: </label>
                <select id="lokacija" name="lokacija">
                <option selected="selected">1</option>
                <option >2</option>
                <option>3</option>                
             </select><br><br> 
            <label for="visina">Visina: </label>
            <input type="text"  id="visina" name="visina" size="4" maxlength="4"><br><br>
            <label for="sirina">Sirina: </label>
            <input type="text"  id="sirina" name="sirina" size="4" maxlength="4"><br><br>
            <input type="submit" class="button" value="Kreiraj poziciju oglasa">
    </form><?php }} ?>
