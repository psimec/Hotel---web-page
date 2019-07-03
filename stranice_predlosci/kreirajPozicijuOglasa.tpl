<script src="JS/kreirajPozicijuOglasa.js" type="text/javascript"></script> 
{$greska}
{$uspjeh}
<form class="formaUnos"id="kreirajPozicijuOglasa" enctype="multipart/form-data" name="kreirajHotel" novalidate method="post"  action={$slanje}>
        <p> <label for="moderator">Moderator: </label>
            <select id="moderator" name="moderator">
                {$moderatori}
             </select><br><br> 
             <label for="stranica">Stranica: </label>
             <select id="stranica" name="stranica">
                <option selected="selected" >== Odaberi stranicu ==</option>
                <option >prijava.php</option>
                <option >registracija.php</option>
                <option>index.php</option>                
             </select><br><br> 
            <label for="lokacija">Broj lokacije: </label>
                <select id="lokacija" name="lokacija">
                <option selected="selected">1</option>
                <option >2</option>
                <option>3</option>                
             </select><br><br> 
            <label for="visina">Visina: </label>
            <input type="text"  id="visina" name="visina" size="4" maxlength="4"><br><br>
            <label for="sirina">Sirina: </label>
            <input type="text"  id="sirina" name="sirina" size="4" maxlength="4"><br><br>
            <input type="submit" class="button" value="Kreiraj poziciju oglasa">
    </form>