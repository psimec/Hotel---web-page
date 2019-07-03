<br><br> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/registracija.js" type="text/javascript"></script> 
{$ispisPotvrda}
<form class="formaUnos" id="registracija" novalidate method="post"  action={$slanje}>
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
            <input type="submit" class="button" value=" Kreiraj moderatora ">
    </form>  