<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/urediPozicijuOglasa.js" type="text/javascript"></script> 
{$greska}
{$uspjeh}
<form class="formaUnos"id="urediPozicijuOglasa" enctype="multipart/form-data" name="kreirajHotel" novalidate method="post"  action={$slanje}>
        <p> <label for="podaci">Moderator: </label>
            <select id="podaci" name="podaci">
                {$podaci}
             </select><br><br>          
            <label for="visina">Visina: </label>
            <input type="text"  id="visina" name="visina" size="4" maxlength="4"><br><br>
            <label for="sirina">Sirina: </label>
            <input type="text"  id="sirina" name="sirina" size="4" maxlength="4"><br><br>
            <input type="submit" class="button" value="Uredi poziciju oglasa">
    </form>