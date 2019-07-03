{$opisSobe}
{$potvrda}
<br/><br/> 
<form class="formaUnos" id="rezervacijaSobe" novalidate method="post"  action={$slanje}>
        <p><label for="naslov">Naslov poruke: </label>
            <input type="naslov" id="naslov" name="naslov" size="20" maxlength="20"><br><br>
            <label for="sadrzaj">Sadržaj poruke: </label>
            <input type="sadrzaj" id="sadrzaj" size="30" name="sadrzaj" maxlength="100"><br><br>          
            <input type="submit" class="button" value=" Pošalji rezervaciju">
    </form>  
        