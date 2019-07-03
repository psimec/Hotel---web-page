<script src="JS/kreirajHotel.js" type="text/javascript"></script> 
{$greska}
{$uspjeh}
<form class="formaUnos"id="kreirajHotel" enctype="multipart/form-data" name="kreirajHotel" novalidate method="post"  action={$slanje}>
        <p><input  type="hidden" name="MAX_FILE_SIZE" value="3000000">            
            Postavi sliku hotela: <input id="userfile" name="userfile" type="file"><br><br> 
            <label for="moderator">Moderator: </label>
            <select id="moderator" multiple="multiple" name="moderator[]" size="{$brojModeratora}">
                {$moderatori}
             </select><br><br> 
            <label for="naziv">Naziv: </label>
            <input type="text"  id="naziv" name="naziv" size="30" maxlength="30"><br><br> 
            <label for="ulica">Ulica: </label>
            <input type="text"  id="ulica" name="ulica" size="30" maxlength="30"><br><br>
            <label for="grad">Grad: </label>
            <input type="text"  id="grad" name="grad" size="30" maxlength="30"><br><br>
            <label for="drzava">Drzava: </label>
            <input type="text"  id="drzava" name="drzava" size="30" maxlength="30"><br><br>
            <label for="oib">OIB: </label>
            <input type="text"  id="oib" name="oib" size="30" maxlength="30"><br><br>
            <label for="telefon">Telefon: </label>
            <input type="text"  id="telefon" name="telefon" size="30" maxlength="30"><br><br>
            <label for="email">Email: </label>
            <input type="text"  id="email" name="email" size="30" maxlength="30"><br><br>
            <label for="zvjezdice">Broj zvjezdica: </label>
            <input type="text"  id="zvjezdice" name="zvjezdice" size="4" maxlength="1"><br><br>
            <label for="opis">Opis </label>
            <input type="text"  id="opis" name="opis" size="40" maxlength="40"><br><br>
            <input type="submit" class="button" value="Kreiraj hotel">
    </form>