<?php

class Korisnik {

    private $ime;
    private $prezime;
    private $ulica;
    private $grad;
    private $drzava;
    private $email;
    private $kor_ime;
    private $sol;
    private $lozinka;
    private $k_lozinka;
    private $zadnja_prijava;
    private $idtip_korisnika = 1; // obicni korisnik
    private $status = "0";
    private $adresa;

    public function __construct() {
        
    }

    public function set_podaci($p_kor_ime, $p_ime, $p_prezime, $p_lozinka, $p_ulica, $p_grad, $p_drzava, $p_email) {
        $this->kor_ime = $p_kor_ime;
        $this->ime = $p_ime;
        $this->prezime = $p_prezime;
        $this->email = $p_email;
        $this->ulica = $p_ulica;
        $this->grad = $p_grad;
        $this->drzava = $p_drzava;
        $this->sol = sha1(time());
        $this->lozinka = $p_lozinka;
        $this->k_lozinka = $this->kriptiraj();
        $this->zadnja_prijava = date("Y-m-d H:i:s");
        $this->idtip_korisnika = 1;
        $this->status = "";
        $this->adresa = $_SERVER["REMOTE_ADDR"];
    }

    public function set_status($p_status) { // "" - nije aktiviran / normalan / blokiran
        $this->status = $p_status;
    }

    public function get_tipkorisnika() {
        return $this->idtip_korisnika;
    }
    
    public function set_tipkorisnika($p_tip) {
        $this->idtip_korisnika = $p_tip;
    }

    public function get_kor_ime() {
        return $this->kor_ime;
    }

    public function get_ime_prezime() {
        return $this->ime . " " . $this->prezime;
    }

    public function get_prezime() {
        return $this->prezime;
    }

    public function get_ime() {
        return $this->ime;
    }

    public function get_prijavljen_od() {
        return date("d.m.Y H:i:s", $this->prijavljen_od);
    }

    public function get_aktivan() {
        return time() - $this->prijavljen_od;
    }

    public function get_adresa() {
        return $this->adresa;
    }

    public function upisi_korisnika() {
        include_once './klase//baza.class.php';
        $baza = new Baza();
        $baza->spojiDB();

        $sql = "insert into korisnik values (null,'$this->ime','$this->prezime','$this->ulica','$this->grad','$this->drzava',"
                . "'$this->email','$this->kor_ime','$this->lozinka','$this->sol','$this->k_lozinka','$this->status', "
                . "default, '$this->zadnja_prijava', '$this->adresa', '$this->idtip_korisnika')";
        $rs = $baza->selectDB($sql);
        $baza->zatvoriDB();
    }

    public function kriptiraj() {
        return sha1($this->sol . "-" . $this->lozinka);
    }

    public function posaljiAktivaciju() {
        include_once './klase//mail.php';
        $mail = new mail();
        $trajanjeAktivacije = date("Y-m-d H:i:s", strtotime('+7 hours', strtotime(date("Y-m-d H:i:s")))); // dodaje 7 sati na trenutno vrijeme
        $link = "https://barka.foi.hr/WebDiP/2017_projekti/WebDiP2017x137/registracija.php?data=$this->kor_ime&traje=$trajanjeAktivacije";
        $poruka = "Poštovani, \n\n "
                . "kreirali ste krisnički račun na stranici 'Hoteli' \n\n"
                . "Vaši uneseni podaci: \n\n"
                . "Korisnicko ime: $this->kor_ime\n"
                . "Lozinka: $this->lozinka\n\n"
                . "Da bi se kreirao Vaš korisnicki racun, molimo vas da ga "
                . "aktivirate na linku: $link\n";
        //http://localhost/Projekt/registracija.php?data=ime&traje=2019-05-24 16:20:53 - primjer poruke
        $mail->set_podaci($this->email, "Aktivacija korisnickog racuna", $poruka);
        return $mail->posaljiMail();
    }

}

?>
