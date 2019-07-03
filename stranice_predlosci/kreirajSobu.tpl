<script src="JS/kreiranjeSoba.js" type="text/javascript"></script> 
{$greska}
{$uspjeh}
<form class="formaUnos" id="unosSobe" novalidate method="post" enctype="multipart/form-data" action={$slanje}>
        <p><input  type="hidden" name="MAX_FILE_SIZE" value="3000000">
            Postavi sliku sobe: <input id="userfile" name="userfile" type="file"><br><br> 
            <label for="hotel">Hotel: </label>
            <select id="hotel" name="hotel">
                {$hoteli}
             </select><br><br> 
            <label for="naziv">Velicina sobe: </label>
            <input type="text"  id="broj_lezaja" name="broj_lezaja" size="20" maxlength="20"><br><br>    
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
            <input type="submit" class="button" value="Kreiraj sobu">
    </form>
    <br><br><br><br>