<?php

class Session {

    const korime = "korime";
    const tip = "tip";
    const id = "id";

    function kreirajSesiju($korime, $tip_korisnika, $id_korisnika) {

        if (session_id() == "") {
            session_start();
        }

        $_SESSION[self::korime] = $korime;
        $_SESSION[self::tip] = $tip_korisnika;
        $_SESSION[self::id] = $id_korisnika;
    }

    function brisiSesiju() {
        unset($_SESSION[self::korime]);
        unset($_SESSION[self::tip]);
        unset($_SESSION[self::id]);
        session_destroy();
    }

    function kreirajCookie($korIme) {
        setcookie("korisnik", $korIme, time() + (2*24*60*60));
    }

    function brisiCookie() {
        setcookie("korisnik", "", time() - 60 * 60 * 2);
    }
}
?>