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

include_once './klase//dnevnik.php';
include_once './klase//baza.class.php';
$baza = new Baza();
$baza->spojiDB();
$sviKorisnici = "";
$svaKorimena = "";

$korisnicko_ime = $_SESSION["korime"];
$idkorisnik = $_SESSION["id"];

// dohvati sve korisnike osim admina
$sql = "select korisnicko_ime, status, idkorisnik FROM korisnik WHERE (idtip_korisnika = 1 or idtip_korisnika = 2);";
$rs = $baza->selectDB($sql);

$sviKorisnici .= "<h3><table id='sobeTablica' border=1><thead><tr><th>Korisnicko ime</th><th>Trenutni status</th></tr></thead><tbody></h3>\n";
while (list($korime, $status, $idkorisnik) = $rs->fetch_array()) { 
    $sviKorisnici .= "<tr><td>$korime</td><td>$status</td></tr>\n";
    $svaKorimena .= "<option value='$idkorisnik'>$korime</option>\n";
}
$sviKorisnici .= "</tbody></table>";

if (isset($_POST["status"])) {// update podataka u bazi
    foreach ($_POST as $k => $v) {
        if ($k == "korisnik") {
            $idkorisnik = $v;
        }
        if ($k == "status") {
            $status = $v;
        }         
    }
    if ($status == "blokiran") {
        $sql = "UPDATE korisnik SET status='blokiran' WHERE idkorisnik=$idkorisnik";      
    }else{
        $sql = "UPDATE korisnik SET status='normalan' WHERE idkorisnik=$idkorisnik";
    }
    $baza->updateDB($sql);
    dnevnik::update($korisnicko_ime, $sql, 1);
    header("Location: $slanje");
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik',"");
$smarty->assign('moderator',"");
$smarty->assign('pozdravKorisniku',$_SESSION["korime"]);
$smarty->assign('naslov', "Upravljanje korisnicima");
$smarty->assign('slanje', $slanje);
$smarty->assign('sviKorisnici', $sviKorisnici);
$smarty->assign('svaKorimena', $svaKorimena);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/upravljanjeKorisnicima.tpl');
$smarty->display('predlosci/footer.tpl');
?>