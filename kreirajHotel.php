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
include_once './klase//dnevnik.php';
$baza = new Baza();
$baza->spojiDB();

$greska = "";
$uspjeh = "";
$ispisGreska = "";
$ispisUspjeha = "";
$moderatori = "";
$idKorisnik = $_SESSION["id"];
$korisnicko_ime = $_SESSION["korime"];

$sql = "SELECT korisnicko_ime, idkorisnik FROM korisnik WHERE idtip_korisnika = 2;";
$rs = $baza->selectDB($sql);
$brojModeratora = 0;


while (list($korime, $id) = $rs->fetch_array()) { // dohvati sve moderatore
    $moderatori .= "<option value='$id'>$korime</option>\n";
    $brojModeratora ++;
}

if (isset($_POST["naziv"])) { //ako je forma poslana, unos podataka u bazu
    $uzorak = '/^.+\.[jp][pn]g$/'; //provjerava je li je slika u dobrom formatu
    $datoteka = $_FILES['userfile']['name'];
    if (!preg_match($uzorak, $datoteka)) {
        $greska .= "Slika nije u odgovarajucem formatu" . "<br/>";
    } else { // ako je dobar format, salji podatke u bazu i sliku na server
        $userfile = $_FILES['userfile']['tmp_name'];
        $userfile_name = $_FILES['userfile']['name'];
        $userfile_size = $_FILES['userfile']['size'];
        $userfile_type = $_FILES['userfile']['type'];
        $upfile = "./slike/hoteli/" . $userfile_name;

        if (is_uploaded_file($userfile)) {
            if (!move_uploaded_file($userfile, $upfile)) {
                $greska .= 'Problem: nije moguće prenijeti datoteku na odredište';
            }
        } else {
            $greska .= 'Problem: mogući napad prijenosom. Datoteka: ' . $userfile_name;
        }
        $naziv = $_POST["naziv"];
        $ulica = $_POST["ulica"];
        $grad = $_POST["grad"];
        $drzava = $_POST["drzava"];
        $oib = $_POST["oib"];
        $telefon = $_POST["telefon"];
        $email = $_POST["email"];
        $zvjezdice = $_POST["zvjezdice"];
        $opis = $_POST["opis"];
        $moderatori = $_POST["moderator"];
        $sql = "INSERT INTO hotel VALUES (null, '$naziv', '$ulica', '$grad',"
                . " '$drzava', $oib, '$telefon', '$email',"
                . " $zvjezdice, '$datoteka', '$opis');";

        if ($baza->updateDB($sql)) { // upis podataka u bazu
            $uspjeh .= 'Datoteka uspješno prenesena, podaci su upisani<br/><br/>';
            dnevnik::insert($korisnicko_ime, $sql, 1);
        } else {
            $greska .= 'Doslo je do greske<br/><br/>';
            dnevnik::insert($korisnicko_ime, $sql, 0);
        }

        // dohvati id za unos u tablicu hotel_moderator
        $sql = "SELECT idhotel FROM hotel WHERE naziv = '$naziv' and ulica = '$ulica';";
        $rs = $baza->selectDB($sql);
        $podaci = $rs->fetch_array();
        $idhotel = $podaci['idhotel'];

        //unesi u tablicu hotel_moderator za svakog oznacenog moderatora
        foreach ($moderatori as $odabraniModerator) {
            $sql = "INSERT INTO moderator_hotela VALUES (null, $odabraniModerator, $idhotel);";
            $baza->updateDB($sql);
            dnevnik::insert($korisnicko_ime, $sql, 0);
        }
    }
}

if ($greska != "") {
    $ispisGreska = "<div class='isa_error'>$greska</div>";
}

if ($uspjeh != "") {
    $ispisUspjeha = "<div class='isa_success'>$uspjeh</div>";
}

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik',"");
$smarty->assign('moderator',"");
$smarty->assign('pozdravKorisniku',$_SESSION["korime"]);
$smarty->assign('naslov', "Kreiraj hotel");
$smarty->assign('slanje', $slanje);
$smarty->assign('greska', $ispisGreska);
$smarty->assign('uspjeh', $ispisUspjeha);
$smarty->assign('brojModeratora', $brojModeratora);
$smarty->assign('moderatori', $moderatori);
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/kreirajHotel.tpl');
$smarty->display('predlosci/footer.tpl');
?>