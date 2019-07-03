<?PHP

session_start();
if (!isset($_SESSION["korime"]) || !isset($_SESSION["tip"])) {
    header("Location: ./okviri/error.php?e=2");
    exit();
} else if (!($_SESSION["tip"] == 3)) {
    header("Location: ./okviri/error.php?e=2");
    exit();
}

$slanje = $_SERVER['PHP_SELF'];

include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();

$pretraga = "";


if (isset($_POST["period_od"]) || isset($_POST["period_do"])) { // ako je forma poslana
    $datumOd = date("Y-m-d H:i:s", strtotime($_POST["period_od"]));
    $datumDo = date("Y-m-d H:i:s", strtotime($_POST["period_do"]));
    $dodaj = "";

    if (!empty($_POST["period_od"])) { // ako od je upisan
        $dodaj .= "and vrijeme >= '" . $datumOd . "'";
    }
    if (!empty($_POST["period_do"])) {// ako do je upisan
        $dodaj .= "and vrijeme <= '" . $datumDo . "'";
    }

    $sql = "SELECT * FROM dnevnik_rada where iddnevnik_rada > 0 $dodaj ORDER BY 2 DESC;";
    $rs = $baza->selectDB($sql);

    $pretraga .= "<table id='sobeTablica' border=1><thead><tr><th>Korisnik</th><th>Vrijeme</th><th>Radnja</th><th>Upit</th><th>Uspjesnost</th></tr></thead><tbody>\n";
    while (list($id, $korisnik, $vrijeme, $radnja, $upit, $uspjesnost) = $rs->fetch_array()) {
        $pretraga .= "<tr><td>$korisnik</td><td>$vrijeme</td><td>$radnja</td><td>$upit</td><td>$uspjesnost</td></tr>\n";
    }
    $pretraga .= "</tbody></table>";
} else { // ako korisnik samo dode na stranicu
    $sql = "SELECT * FROM dnevnik_rada";
    $rs = $baza->selectDB($sql);

    $pretraga .= "<table id='sobeTablica' border=1><thead><tr><th>Korisnik</th><th>Vrijeme</th><th>Radnja</th><th>Upit</th><th>Uspjesnost</th></tr></thead><tbody>\n";
    while (list($id, $korisnik, $vrijeme, $radnja, $upit, $uspjesnost) = $rs->fetch_array()) {
        $pretraga .= "<tr><td>$korisnik</td><td>$vrijeme</td><td>$radnja</td><td>$upit</td><td>$uspjesnost</td></tr>\n";
    }
    $pretraga .= "</tbody></table>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik',"");
$smarty->assign('moderator',"");
$smarty->assign('pozdravKorisniku',$_SESSION["korime"]);
$smarty->assign('naslov', "Dnevnik rada");
$smarty->assign('slanje', $slanje);
$smarty->assign('pretraga', $pretraga);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/pregledDnevnik.tpl');
$smarty->display('predlosci/footer.tpl');
?>