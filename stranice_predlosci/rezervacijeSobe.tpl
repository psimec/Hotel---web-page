<script src="JS/rezervacijeSobe.js" type="text/javascript"></script> 
{$greska}
{$uspjeh}
<form class="formaUnos"id="unesiRezervaciju" name="unesiRezervaciju" novalidate method="post"  action={$slanje}>
        <p><label for="broj_sobe">Trazena soba: </label>
            <select id="broj_sobe" name="broj_sobe">
                {$sobe}
             </select><br><br> 
             <label for="korisnik">Korisnik: </label>
            <select id="korisnik" name="korisnik">
                {$korisnici}
             </select><br><br> 
            <label for="trajanje">Trajanje u danima: </label>
            <input type="text"  id="trajanje" name="trajanje" size="3" maxlength="5"><br><br> 
            <label for="datum">Datum dolaska: </label>
            <input type="date"  id="datum" name="datum" size="50" maxlength="50"><br><br>    
            <label for="vrijeme">Vrijeme dolaska: </label>
            <input type="time"  id="vrijeme" name="vrijeme" size="50" maxlength="50"><br><br> 
            <input type="submit" class="button" value="Kreiraj rezervaciju">
    </form>