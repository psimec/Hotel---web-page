<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 19:00:43
         compiled from "stranice_predlosci\urediPozicijuOglasa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140725b1176b2aac429-12712346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '316a227998f26b8d76e7c6b558281d79cf48ad40' => 
    array (
      0 => 'stranice_predlosci\\urediPozicijuOglasa.tpl',
      1 => 1527872393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140725b1176b2aac429-12712346',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b1176b2aacca1_29283007',
  'variables' => 
  array (
    'greska' => 0,
    'uspjeh' => 0,
    'slanje' => 0,
    'podaci' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1176b2aacca1_29283007')) {function content_5b1176b2aacca1_29283007($_smarty_tpl) {?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/urediPozicijuOglasa.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['greska']->value;?>

<?php echo $_smarty_tpl->tpl_vars['uspjeh']->value;?>

<form class="formaUnos"id="urediPozicijuOglasa" enctype="multipart/form-data" name="kreirajHotel" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p> <label for="podaci">Moderator: </label>
            <select id="podaci" name="podaci">
                <?php echo $_smarty_tpl->tpl_vars['podaci']->value;?>

             </select><br><br>          
            <label for="visina">Visina: </label>
            <input type="text"  id="visina" name="visina" size="4" maxlength="4"><br><br>
            <label for="sirina">Sirina: </label>
            <input type="text"  id="sirina" name="sirina" size="4" maxlength="4"><br><br>
            <input type="submit" class="button" value="Uredi poziciju oglasa">
    </form><?php }} ?>
