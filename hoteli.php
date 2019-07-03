<?php

include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();

$sql = "select naziv, putanja_do_slike, idhotel, ulica, email, broj_zvjezdica from hotel";
$rs = $baza->selectDB($sql);
$slike = "";

while (list($naziv, $putanja_slike, $idhotel, $ulica, $email, $broj_zvjezdica) = $rs->fetch_array()) { // ispis svih hotela (slike)
    if (file_exists("./slike/hoteli/" . $putanja_slike)) {
        $slike .= "<div class='galerija1'>";
        $slike .= "<a href='sobe.php?data=$idhotel'><img style='width:100%' src='./slike/hoteli/" . $putanja_slike . "'></a>";
        $slike .= "<div class='galerija2'>";
        $slike .= "<p style='font-weight: bold;'>" . $naziv . "</p>";
        $slike .= "<p>Ulica: " . $ulica . "</p>";
        $slike .= "<p>Email: " . $email . "</p>";
        $slike .= "<p>Broj zvjezdica: " . $broj_zvjezdica . "</p>";
        $slike .= "</div>";
        $slike .= "</div>";
    }
}
require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('naslov', "Hoteli");
$smarty->assign('slike', $slike);
$smarty->display('predlosci/nePrijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/hoteli.tpl');
$smarty->display('predlosci/footer.tpl');
$baza->zatvoriDB();
?>