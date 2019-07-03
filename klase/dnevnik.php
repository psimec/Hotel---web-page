<?php

class dnevnik {
     public static function registracija($korime, $uspjesnost){
        include_once 'baza.class.php';
        $baza = new Baza();
        $baza->spojiDB();
        $sql="INSERT INTO dnevnik_rada VALUES(null, '$korime',now(),'registracija', null, '$uspjesnost');";
        $baza->updateDB($sql);
    }

    public static function prijava($korime, $uspjesnost){
        include_once 'baza.class.php';
        $baza = new Baza();
        $baza->spojiDB();
        $sql="INSERT INTO dnevnik_rada VALUES(null, '$korime',now(),'prijava', null, '$uspjesnost');";
        $baza->updateDB($sql);
    }

    public static function odjava($korime, $uspjesnost){
        include_once 'baza.class.php';
        $baza = new Baza();
        $baza->spojiDB();
        $sql="INSERT INTO dnevnik_rada VALUES(null, '$korime',now(),'odjava', null, '$uspjesnost');";
        $baza->updateDB($sql);
    }

    public static function insert($korime, $upit, $uspjesnost){
        include_once 'baza.class.php';
        $baza = new Baza();
        $baza->spojiDB();
        $sql="INSERT INTO dnevnik_rada VALUES(null, '$korime',now(),'insert', \"$upit\", '$uspjesnost');";
        $baza->updateDB($sql);
    }

    public static function update($korime, $upit, $uspjesnost){
        include_once 'baza.class.php';
        $baza = new Baza();
        $baza->spojiDB();
        $sql="INSERT INTO dnevnik_rada VALUES(null, '$korime',now(),'update', \"$upit\", '$uspjesnost');";
        $baza->updateDB($sql);
    }

    public static function delete($korime, $upit, $uspjesnost){
        include_once 'baza.class.php';
        $baza = new Baza();
        $baza->spojiDB();
        $sql="INSERT INTO dnevnik_rada VALUES(null, '$korime',now(),'delete', \"$upit\", '$uspjesnost');";
        $baza->updateDB($sql);
    }

    public static function ostalo($korime, $upit, $radnja){
        include_once 'baza.class.php';
        $baza = new Baza();
        $baza->spojiDB();
        $sql="INSERT INTO dnevnik_rada VALUES(null, '$korime',now(),'$radnja', \"$upit\", null);";
        $baza->updateDB($sql);
    }
}

?>
