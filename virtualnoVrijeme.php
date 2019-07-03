<?PHP 
session_start();
if (!isset($_SESSION["korime"]) || !isset($_SESSION["tip"])) {
    header("Location: ./okviri/error.php?e=2");
    exit();
} else if (!($_SESSION["tip"] == 3)) {
    header("Location: ./okviri/error.php?e=2");
    exit();
}

include_once "/okviri/dohvatiVrijeme.php";

$stvarnoVrijeme =  time();
$virtualnoVrijeme = virtualno_vrijeme();


$prikaziStvarno = "Stvarno vrijeme servera: " . date('d.m.Y H:i:s',$stvarnoVrijeme) . "<br>";
$prikaziVirtualno = "Virtualno vrijeme sustava: " . date('d.m.Y H:i:s',$virtualnoVrijeme) . "<br>";

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik',"");
$smarty->assign('moderator',"");
$smarty->assign('pozdravKorisniku',$_SESSION["korime"]);
$smarty->assign('naslov', "Virtualno vrijeme");
$smarty->assign('prikaziStvarno', $prikaziStvarno);
$smarty->assign('prikaziVirtualno', $prikaziVirtualno);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/virtualnoVrijeme.tpl');
$smarty->display('predlosci/footer.tpl');
?>