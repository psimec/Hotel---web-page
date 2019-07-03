<?php
$e = $_GET["e"];
$message = "";
switch ($e) {
    case -1: $message = "Korisnik ne postoji.";
        break;
    case 0: $message = "Neispravno korisničko ime/lozinka.";
        break;
    case 2: $message = "Neautorizirani pristup.";
        break;
    default: $message = "Nepoznata pogreska.";
        break;
}
print $message;
?>
