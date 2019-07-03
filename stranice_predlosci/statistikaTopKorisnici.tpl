{$ispisPotvrda}
<form class="formaUnos" novalidate method="post"  action={$slanje}>
        <p> <label for="brojKorisnika">Broj korisnika: </label>
            <input type="number" id="brojKorisnika" name="brojKorisnika" value="5"><br><br>
            <label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
            <input type="submit" class="button" value="Filtriraj">
            <a class="button" target="_blank" href="./okviri/grafovi.php?graf=topKorisnici">Prikazi graf</a>
    </form>
    <br><br><br><br>
    {$pretraga}