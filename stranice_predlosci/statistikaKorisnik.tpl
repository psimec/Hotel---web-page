{$ispisPotvrda}
<form class="formaUnos" novalidate method="post"  action={$slanje}>
        <p> <label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
            <label for="vrstaOglasa">Vrsta oglasa: </label>
            <select id="vrstaOglasa" name="vrstaOglasa"><br/><br/>
                {$vrstaOglasa}
             </select><br><br>    
             <label for="radio">Sortiraj po: </label><br/><br/>
             <input type="radio" name="radio" value="vise"> Više klikova
             <input type="radio" name="radio" value="manje"> Manje klikova<br><br>
            <input type="submit" class="button" value="Filtriraj">
    </form>
    <br><br><br><br>
    {$pretraga}