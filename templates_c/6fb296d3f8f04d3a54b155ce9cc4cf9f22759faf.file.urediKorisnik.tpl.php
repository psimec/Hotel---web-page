<?php /* Smarty version Smarty-3.1.18, created on 2018-06-03 20:50:51
         compiled from "stranice_predlosci\urediKorisnik.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61945b143568cfc1e8-58382993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fb296d3f8f04d3a54b155ce9cc4cf9f22759faf' => 
    array (
      0 => 'stranice_predlosci\\urediKorisnik.tpl',
      1 => 1528051679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61945b143568cfc1e8-58382993',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b143568cfe178_04276280',
  'variables' => 
  array (
    'ispisPotvrda' => 0,
    'ispisGreska' => 0,
    'slanje' => 0,
    'pisiIme' => 0,
    'pisiPrezime' => 0,
    'pisiKorime' => 0,
    'pisiUlica' => 0,
    'pisiGrad' => 0,
    'pisiDrzava' => 0,
    'pisiEmail' => 0,
    'pisiLozinka' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b143568cfe178_04276280')) {function content_5b143568cfe178_04276280($_smarty_tpl) {?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/registracija.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['ispisPotvrda']->value;?>

<?php echo $_smarty_tpl->tpl_vars['ispisGreska']->value;?>

<form class="formaUnos" id="registracija" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p><label for="ime">Ime: </label>
            <input type="text" id="ime" name="ime" size="20" maxlength="30" placeholder="Ime" autofocus="autofocus" value='<?php echo $_smarty_tpl->tpl_vars['pisiIme']->value;?>
' ><br><br>
            <label for="prezime">Prezime: </label>
            <input type="text"  id="prezime" name="prezime" size="20" maxlength="50" placeholder="Prezime" value="<?php echo $_smarty_tpl->tpl_vars['pisiPrezime']->value;?>
"><br><br>
            <label for="korime">Korisničko ime: </label>
            <input type="text"  id="korime" name="korime" size="20" maxlength="20" placeholder="Korisničko ime" value='<?php echo $_smarty_tpl->tpl_vars['pisiKorime']->value;?>
' ><br><br>
            <label for="ulica">Ulica: </label>
            <input type="text"  id="ulica" name="ulica" size="20" maxlength="20" placeholder="Ulica" value='<?php echo $_smarty_tpl->tpl_vars['pisiUlica']->value;?>
' ><br><br>
            <label for="grad">Grad: </label>
            <input type="text"  id="grad" name="grad" size="20" maxlength="20" placeholder="Grad" value='<?php echo $_smarty_tpl->tpl_vars['pisiGrad']->value;?>
' ><br><br>
            <label for="drzava">Država: </label>
            <input type="text"  id="drzava" name="drzava" size="20" maxlength="20" placeholder="Drzava" value='<?php echo $_smarty_tpl->tpl_vars['pisiDrzava']->value;?>
' ><br><br>
            <label for="email">Email adresa: </label>
            <input type="email" id="email" name="email" size="50"  placeholder="ime.prezime@posluzitelj.xxx" value='<?php echo $_smarty_tpl->tpl_vars['pisiEmail']->value;?>
' ><br><br>
            <label for="lozinka">Lozinka: </label>
            <input type="password" id="lozinka" name="lozinka" size="50" maxlength="30"  placeholder="lozinka" value='<?php echo $_smarty_tpl->tpl_vars['pisiLozinka']->value;?>
' ><br><br>
            <label for="ponovljena_lozinka">Potvrda lozinike: </label>
            <input type="password" id="ponovljena_lozinka" name="ponovljena_lozinka" size="50" maxlength="30"  placeholder="lozinka" value='<?php echo $_smarty_tpl->tpl_vars['pisiLozinka']->value;?>
' ><br> <br>
            <br/>
            <input type="submit" class="button" value="Uredi profil">
    </form>  <?php }} ?>
