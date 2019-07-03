<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/timer.js" type="text/javascript"></script> 
{$ispisGreska}
<br><br> 
<div class='lijevo_oglas'>
{$prijavaPoz1}
</div>
<div class='desno_oglas'>
{$prijavaPoz2}
</div>
<form class="formaUnos" novalidate method="post"  action={$slanje}>
        <p><label for="korime">Korisničko ime: </label>
            <input type="text" id="korime" name="korime" size="20" maxlength="20" placeholder="Korisničko ime"  ><br><br>
            <label for="lozinka">Lozinka: </label>
            <input type="password" id="lozinka" size="30" name="lozinka" maxlength="30" placeholder="lozinka" ><br><br>          
            <input type="submit" class="button" value=" Prijavi se "><a class="navLinkovi" href="prijava.php?data=zaboravljenaLozinka&korime={$korimeZab}">Zaboravljena lozinka</a>
</form>  
<div class='dolje_oglas'>
{$prijavaPoz3}
</div>