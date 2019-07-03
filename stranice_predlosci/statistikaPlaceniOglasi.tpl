{$ispisPotvrda}
<form class="formaUnos" novalidate method="post"  action={$slanje}>
        <p><label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
            <label for="nacin">Filtriraj po: </label>
            <input type="radio" name="nacin" value="vrsta"> Vrsta oglasa
            <input type="radio" name="nacin" value="pozicija"> Pozicija oglasa<br><br> 
            <input type="submit" class="button" value="Filtriraj">
            <a class="button" target="_blank" href="./okviri/grafovi.php?graf=placeniOglasi">Prikazi graf</a>
    </form>
    <br><br><br><br>
    {$pretraga}