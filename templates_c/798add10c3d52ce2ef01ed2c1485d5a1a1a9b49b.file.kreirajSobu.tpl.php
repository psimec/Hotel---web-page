<?php /* Smarty version Smarty-3.1.18, created on 2018-06-03 00:55:42
         compiled from "stranice_predlosci\kreirajSobu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59555b0ac53b4dec01-09204882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '798add10c3d52ce2ef01ed2c1485d5a1a1a9b49b' => 
    array (
      0 => 'stranice_predlosci\\kreirajSobu.tpl',
      1 => 1527980137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59555b0ac53b4dec01-09204882',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b0ac53b506470_30314480',
  'variables' => 
  array (
    'greska' => 0,
    'uspjeh' => 0,
    'slanje' => 0,
    'hoteli' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0ac53b506470_30314480')) {function content_5b0ac53b506470_30314480($_smarty_tpl) {?><script src="JS/kreiranjeSoba.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['greska']->value;?>

<?php echo $_smarty_tpl->tpl_vars['uspjeh']->value;?>

<form class="formaUnos" id="unosSobe" novalidate method="post" enctype="multipart/form-data" action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><input  type="hidden" name="MAX_FILE_SIZE" value="3000000">
            Postavi sliku sobe: <input id="userfile" name="userfile" type="file"><br><br> 
            <label for="hotel">Hotel: </label>
            <select id="hotel" name="hotel">
                <?php echo $_smarty_tpl->tpl_vars['hoteli']->value;?>

             </select><br><br> 
            <label for="naziv">Velicina sobe: </label>
            <input type="text"  id="broj_lezaja" name="broj_lezaja" size="20" maxlength="20"><br><br>    
            <label for="velicina_sobe">Velicina sobe: </label>
            <select id="velicina_sobe" name="velicina_sobe">
                <option selected="selected" >== Odaberi vrstu sobe ==</option>
                <option >jednokrevetna soba s pogledom</option>
                <option >dvokrevetna soba s pogledom</option>
                <option>trokrevetna soba s pogledom</option>
                <option>jednokrevetna soba bez pogleda</option>                
                <option>dvokrevetna soba bez pogleda</option>
                <option>trokrevetna soba bez pogleda</option>                
             </select><br><br> 
            <input type="submit" class="button" value="Kreiraj sobu">
    </form>
    <br><br><br><br><?php }} ?>
