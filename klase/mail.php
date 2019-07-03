<?php

class mail {

    private $mail_to;
    private $mail_from;
    private $mail_subject;
    private $mail_body;

    public function set_podaci($p_mail_to, $p_mail_subject, $p_mail_body) {
        $this->mail_to = $p_mail_to;
        $this->mail_from = "From: info@dhotel.com";
        $this->mail_subject = $p_mail_subject;
        $this->mail_body = $p_mail_body;
    }

    public function posaljiMail() {
        if (mail($this->mail_to, $this->mail_subject, $this->mail_body, $this->mail_from)) {
            return ("Poslana poruka za: '$this->mail_to'!");
        } else {
            return ("Problem kod poruke za: '$this->mail_to'!");
        }
    }

}
