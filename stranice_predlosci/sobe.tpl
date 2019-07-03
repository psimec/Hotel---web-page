<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="JS/sortirajTablicu.js" type="text/javascript"></script> 
{$potvrda}
<form class="formaUnos" novalidate method="post"  action={$slanje}>
        <p> <label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
            <label for="velicina_sobe">Velicina sobe: </label>
            <select id="velicina_sobe" name="velicina_sobe">
                <option selected="selected" >== Odaberi vrstu sobe ==</option>
                <option >jednokrevetna soba s pogledom</option>
                <option >dvokrevetna soba s pogledom</option>
                <option>trokrevetna soba s pogledom</option>
                <option>jednokrevetna soba bez pogleda</option>                
                <option>dvokrevetna soba bez pogleda</option>
                <option>trokrevetna soba bez pogleda</option>                
             </select><br><br> 
            <label for="hotel">Hotel: </label>
            <select id="hotel" name="hotel">
                {$hoteli}
             </select><br><br>            
            <input type="submit" class="button" value="Pretraži">
    </form>
    <br><br><br><br>
    {$sobeHotela}
    {$tablica}