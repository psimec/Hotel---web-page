<script src="JS/blokiranjeOglasa.js" type="text/javascript"></script>
{$greska}
{$uspjeh}
<form class="formaUnos"id="blokiranjeOglasa" name="blokiranjeOglasa" novalidate method="post"  action={$slanje}>
        <p><label for="ime_oglasa">Naziv oglasa: </label>
            <select id="ime_oglasa" name="ime_oglasa">
                {$naziviOglasa}
             </select><br><br> 
            <label for="ime">Opis: </label>
            <textarea cols="40" rows="8" id="opis" name="opis" size="80" maxlength="500" autofocus="autofocus"></textarea><br><br>
            <input type="submit" class="button" value="Pošalji zatjev za blokiranjem">
    </form>
    <br><br><br><br>