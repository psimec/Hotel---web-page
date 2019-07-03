<script src="JS/kreirajOglas.js" type="text/javascript"></script> 
{$greska}
{$uspjeh}
<form class="formaUnos" id="unosOglasa"  method="post"  files="true" enctype="multipart/form-data" action={$slanje}>
        <p><input  type="hidden" name="MAX_FILE_SIZE" value="3000000">
            Postavi sliku oglasa: <input id="userfile" name="userfile" type="file" value="{$postaviImeSlike}"><br><br> 
            <label for="vrsta_oglasa">Odaberi vrstu: </label><br><br> 
            <select id="vrsta_oglasa" name="vrsta_oglasa" select="{$postaviVrstaOglasa}">
                {$vrste}
             </select><br><br> 
            <label for="naziv">Naziv oglasa: </label>
            <input type="text"  id="naziv" name="naziv" size="50" maxlength="50" value="{$postaviNaziv}"><br><br>    
            <label for="opis">Opis: </label>
            <input type="text"  id="opis" name="opis" size="50" maxlength="50" value="{$postaviOpis}"><br><br> 
            <label for="url">Url: </label>
            <input type="text"  id="url" name="url" size="50" maxlength="60" value="{$postaviUrl}" ><br><br> 
            <label for="datum">Aktivan od datuma: </label>
            <input type="date"  id="datum" name="datum" size="50" maxlength="60" required><br><br> 
            <label for="vrijeme">Aktivan od vremena: </label>
            <input type="time"  id="vrijeme" name="vrijeme" size="50" maxlength="60" required><br><br> 
            <input type="submit" class="button" value="Posalji zahtjev">
    </form>
    <br><br><br><br>