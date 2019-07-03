<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 13:27:51
         compiled from "stranice_predlosci\blokiranjeOglasa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:266165b097789f1dc01-56117646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69a40e08191fdfc790ea73f5540170cb6e983a3e' => 
    array (
      0 => 'stranice_predlosci\\blokiranjeOglasa.tpl',
      1 => 1527845566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '266165b097789f1dc01-56117646',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b097789f1e8d8_59530362',
  'variables' => 
  array (
    'greska' => 0,
    'uspjeh' => 0,
    'slanje' => 0,
    'naziviOglasa' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b097789f1e8d8_59530362')) {function content_5b097789f1e8d8_59530362($_smarty_tpl) {?><script src="JS/blokiranjeOglasa.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->tpl_vars['greska']->value;?>

<?php echo $_smarty_tpl->tpl_vars['uspjeh']->value;?>

<form class="formaUnos"id="blokiranjeOglasa" name="blokiranjeOglasa" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><label for="ime_oglasa">Naziv oglasa: </label>
            <select id="ime_oglasa" name="ime_oglasa">
                <?php echo $_smarty_tpl->tpl_vars['naziviOglasa']->value;?>

             </select><br><br> 
            <label for="ime">Opis: </label>
            <textarea cols="40" rows="8" id="opis" name="opis" size="80" maxlength="500" autofocus="autofocus"></textarea><br><br>
            <input type="submit" class="button" value="Pošalji zatjev za blokiranjem">
    </form>
    <br><br><br><br><?php }} ?>
