<?php
session_start();

$korime = $_SESSION["korime"];

include_once '../klase/session.php';
include_once '../klase/dnevnik.php';

dnevnik::odjava($korime, 1);

$session = new Session();
$session->brisiSesiju();
$session->brisiCookie();

header("Location: ../prijava.php")

?>