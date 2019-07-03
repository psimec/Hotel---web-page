<?php /* Smarty version Smarty-3.1.18, created on 2018-06-03 19:09:03
         compiled from "stranice_predlosci\kreirajOglas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59245b09d3c1ab4123-85110627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64f2ae6fc9b129c2df2120fb38e010b21066a1b1' => 
    array (
      0 => 'stranice_predlosci\\kreirajOglas.tpl',
      1 => 1527980243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59245b09d3c1ab4123-85110627',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b09d3c1ab4ce8_29722752',
  'variables' => 
  array (
    'greska' => 0,
    'uspjeh' => 0,
    'slanje' => 0,
    'postaviImeSlike' => 0,
    'postaviVrstaOglasa' => 0,
    'vrste' => 0,
    'postaviNaziv' => 0,
    'postaviOpis' => 0,
    'postaviUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b09d3c1ab4ce8_29722752')) {function content_5b09d3c1ab4ce8_29722752($_smarty_tpl) {?><script src="JS/kreirajOglas.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['greska']->value;?>

<?php echo $_smarty_tpl->tpl_vars['uspjeh']->value;?>

<form class="formaUnos" id="unosOglasa"  method="post"  files="true" enctype="multipart/form-data" action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><input  type="hidden" name="MAX_FILE_SIZE" value="3000000">
            Postavi sliku oglasa: <input id="userfile" name="userfile" type="file" value="<?php echo $_smarty_tpl->tpl_vars['postaviImeSlike']->value;?>
"><br><br> 
            <label for="vrsta_oglasa">Odaberi vrstu: </label><br><br> 
            <select id="vrsta_oglasa" name="vrsta_oglasa" select="<?php echo $_smarty_tpl->tpl_vars['postaviVrstaOglasa']->value;?>
">
                <?php echo $_smarty_tpl->tpl_vars['vrste']->value;?>

             </select><br><br> 
            <label for="naziv">Naziv oglasa: </label>
            <input type="text"  id="naziv" name="naziv" size="50" maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['postaviNaziv']->value;?>
"><br><br>    
            <label for="opis">Opis: </label>
            <input type="text"  id="opis" name="opis" size="50" maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['postaviOpis']->value;?>
"><br><br> 
            <label for="url">Url: </label>
            <input type="text"  id="url" name="url" size="50" maxlength="60" value="<?php echo $_smarty_tpl->tpl_vars['postaviUrl']->value;?>
" ><br><br> 
            <label for="datum">Aktivan od datuma: </label>
            <input type="date"  id="datum" name="datum" size="50" maxlength="60" required><br><br> 
            <label for="vrijeme">Aktivan od vremena: </label>
            <input type="time"  id="vrijeme" name="vrijeme" size="50" maxlength="60" required><br><br> 
            <input type="submit" class="button" value="Posalji zahtjev">
    </form>
    <br><br><br><br><?php }} ?>
