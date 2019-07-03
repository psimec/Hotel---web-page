<?php /* Smarty version Smarty-3.1.18, created on 2018-06-02 23:52:54
         compiled from "stranice_predlosci\registracija.tpl" */ ?>
<?php /*%%SmartyHeaderCode:262375b05c66b3d6040-38018964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f36dbcf5cafa3ea9049923d16e1fbde4609f7fb' => 
    array (
      0 => 'stranice_predlosci\\registracija.tpl',
      1 => 1527975925,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '262375b05c66b3d6040-38018964',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b05c66b3f6935_66552903',
  'variables' => 
  array (
    'ispisPotvrda' => 0,
    'ispisGreska' => 0,
    'registracijaPoz1' => 0,
    'registracijaPoz2' => 0,
    'slanje' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b05c66b3f6935_66552903')) {function content_5b05c66b3f6935_66552903($_smarty_tpl) {?><br><br> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/registracija.js" type="text/javascript"></script> 
<script src="JS/timer.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['ispisPotvrda']->value;?>

<?php echo $_smarty_tpl->tpl_vars['ispisGreska']->value;?>


<div class='lijevo_oglas'>
<?php echo $_smarty_tpl->tpl_vars['registracijaPoz1']->value;?>

</div>
<div class='desno_oglas'>
<?php echo $_smarty_tpl->tpl_vars['registracijaPoz2']->value;?>

</div>
<form class="formaUnos" id="registracija" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><label for="ime">Ime: </label>
            <input type="text" id="ime" name="ime" size="20" maxlength="30" placeholder="Ime" autofocus="autofocus"  ><br><br>
            <label for="prezime">Prezime: </label>
            <input type="text"  id="prezime" name="prezime" size="20" maxlength="50" placeholder="Prezime"><br><br>
            <label for="korime">Korisničko ime: </label>
            <input type="text"  id="korime" name="korime" size="20" maxlength="20" placeholder="Korisničko ime" ><br><br>
            <label for="ulica">Ulica: </label>
            <input type="text"  id="ulica" name="ulica" size="20" maxlength="20" placeholder="Ulica" ><br><br>
            <label for="grad">Grad: </label>
            <input type="text"  id="grad" name="grad" size="20" maxlength="20" placeholder="Grad" ><br><br>
            <label for="drzava">Država: </label>
            <input type="text"  id="drzava" name="drzava" size="20" maxlength="20" placeholder="Drzava" ><br><br>
            <label for="email">Email adresa: </label>
            <input type="email" id="email" name="email" size="50"  placeholder="ime.prezime@posluzitelj.xxx" ><br><br>
            <label for="lozinka">Lozinka: </label>
            <input type="password" id="lozinka" name="lozinka" size="50" maxlength="30"  placeholder="lozinka" ><br><br>
            <label for="ponovljena_lozinka">Potvrda lozinike: </label>
            <input type="password" id="ponovljena_lozinka" name="ponovljena_lozinka" size="50" maxlength="30"  placeholder="lozinka" ><br> <br>
            <br/><br> <br>
            <input type="submit" class="button" value=" Registriraj se ">
    </form>  <?php }} ?>
