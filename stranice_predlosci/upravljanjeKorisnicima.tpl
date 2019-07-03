<script type="text/javascript" src="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.js"></script>             
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.css"/> 
<script src="./JS/korisniciTable.js" type="text/javascript"></script> 
<script src="./JS/obrisiKolacic.js" type="text/javascript"></script> 
<form class="formaUnos" id="zahtjeviBlokiranjeOglasa" novalidate method="post" enctype="multipart/form-data" action={$slanje}>
<label for="moderator">Postavi status korisnika: </label><br>
<select id="korisnik" name="korisnik">
{$svaKorimena}
</select><br><br>
  <input type="radio" name="status" value="normalan"> Normalan
  <input type="radio" name="status" value="blokiran"> Blokiran<br><br> 
<input type="salji" id="posalji" name='posalji' hidden>
<input type="submit" class="button" value="Unesi promijene">
<input onclick="obrisiCookie()" size="23" class="button" value="Resetiraj uvjete korištenja">
</form>
{$sviKorisnici}