<script type="text/javascript" src="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.js"></script>             
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.css"/> 
<script src="./JS/dnevnikTable.js" type="text/javascript"></script> 
<form class="formaUnos" novalidate method="post"  action={$slanje}>
        <p><label for="period_od">Period od: </label>
            <input type="date" id="period_od" name="period_od" size="20" maxlength="30" placeholder="Period od"><br><br>
            <label for="period_do">Period od: </label>
            <input type="date" id="period_do" name="period_do" size="20" maxlength="30" placeholder="Period do"><br><br> 
            <input type="submit" class="button" value="Filtriraj">          
    </form>
    <br><br><br><br>
    {$pretraga}