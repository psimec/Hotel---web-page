<?php /* Smarty version Smarty-3.1.18, created on 2018-06-02 00:11:37
         compiled from "stranice_predlosci\prijava.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130005b05cb299c0b22-70843053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '390a4decb249cd0cd06ade5fe99ae40e91ecb914' => 
    array (
      0 => 'stranice_predlosci\\prijava.tpl',
      1 => 1527891046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130005b05cb299c0b22-70843053',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b05cb299e06c9_10010705',
  'variables' => 
  array (
    'ispisGreska' => 0,
    'prijavaPoz1' => 0,
    'prijavaPoz2' => 0,
    'slanje' => 0,
    'korimeZab' => 0,
    'prijavaPoz3' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b05cb299e06c9_10010705')) {function content_5b05cb299e06c9_10010705($_smarty_tpl) {?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/timer.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['ispisGreska']->value;?>

<br><br> 
<div class='lijevo_oglas'>
<?php echo $_smarty_tpl->tpl_vars['prijavaPoz1']->value;?>

</div>
<div class='desno_oglas'>
<?php echo $_smarty_tpl->tpl_vars['prijavaPoz2']->value;?>

</div>
<form class="formaUnos" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><label for="korime">Korisničko ime: </label>
            <input type="text" id="korime" name="korime" size="20" maxlength="20" placeholder="Korisničko ime"  ><br><br>
            <label for="lozinka">Lozinka: </label>
            <input type="password" id="lozinka" size="30" name="lozinka" maxlength="30" placeholder="lozinka" ><br><br>          
            <input type="submit" class="button" value=" Prijavi se "><a class="navLinkovi" href="prijava.php?data=zaboravljenaLozinka&korime=<?php echo $_smarty_tpl->tpl_vars['korimeZab']->value;?>
">Zaboravljena lozinka</a>
</form>  
<div class='dolje_oglas'>
<?php echo $_smarty_tpl->tpl_vars['prijavaPoz3']->value;?>

</div><?php }} ?>
