<?php /* Smarty version Smarty-3.1.18, created on 2018-06-01 12:07:03
         compiled from "stranice_predlosci\sobe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31755b05e761947437-04214200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c6f31065d6770fefecdfe8383b9a7e62357fd87' => 
    array (
      0 => 'stranice_predlosci\\sobe.tpl',
      1 => 1527847621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31755b05e761947437-04214200',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5b05e761967d36_43774682',
  'variables' => 
  array (
    'potvrda' => 0,
    'slanje' => 0,
    'hoteli' => 0,
    'sobeHotela' => 0,
    'tablica' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b05e761967d36_43774682')) {function content_5b05e761967d36_43774682($_smarty_tpl) {?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/sortirajTablicu.js" type="text/javascript"></script> 
<?php echo $_smarty_tpl->tpl_vars['potvrda']->value;?>

<form class="formaUnos" novalidate method="post"  action=<?php echo $_smarty_tpl->tpl_vars['slanje']->value;?>
>
        <p> <label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
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
            <label for="hotel">Hotel: </label>
            <select id="hotel" name="hotel">
                <?php echo $_smarty_tpl->tpl_vars['hoteli']->value;?>

             </select><br><br>            
            <input type="submit" class="button" value="Pretraži">
    </form>
    <br><br><br><br>
    <?php echo $_smarty_tpl->tpl_vars['sobeHotela']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['tablica']->value;?>
<?php }} ?>
