<script src="JS/kreiranjeVrstiOglasa.js" type="text/javascript"></script> 
{$greska}
{$uspjeh}
<form class="formaUnos"id="unesiVrstuOglasa" name="unesiVrstuOglasa" novalidate method="post"  action={$slanje}>
        <p><label for="broj_sobe">Pozicija oglasa: </label>
            <select id="id_pozicija" name="id_pozicija">
                {$pozicije}
             </select><br><br> 
            <label for="trajanje">Trajanje u danima: </label>
            <input type="text"  id="trajanje" name="trajanje" size="3" maxlength="5"><br><br> 
            <label for="brzina_izmjene">Brzina u sekundama: </label>
            <input type="text"  id="brzina_izmjene" name="brzina_izmjene" size="3" maxlength="5"><br><br> 
            <label for="cijena">Cijena oglasa: </label>
            <input type="text"  id="cijena" name="cijena" size="3" maxlength="5"><br><br> 
            <input type="submit" class="button" value="Kreiraj vrstu oglasa">
    </form>