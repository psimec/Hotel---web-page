<?PHP

$slanje = $_SERVER['PHP_SELF'];

session_start();
ob_start();

if ($_SERVER["HTTPS"] != "on") {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}


include_once './klase//baza.class.php';
include_once './klase//dnevnik.php';
include_once './klase/session.php';
$baza = new Baza();
$baza->spojiDB();
//implementirati odjavu, skripta je u okviri


$korimeZaboravljenaLozinka = ""; //korime ako je zaborvljena lozinka
$ispisGreska = "";
$greska = "";

//logiranje u sustav
if (isset($_POST["korime"])) {
    $korimeZaboravljenaLozinka = $_POST["korime"];
    $korime = $_POST["korime"];
    $lozinka = $_POST["lozinka"];
    include_once './okviri/provjerePrijava.php';
    
    if (postojiKorime($korime)) {
        if (tocnaLozinka($korime, $lozinka)) {
            //lozinka je tocna
            if (!korisnikBlokiran($korime)) {
                // prijava u sustav (korisnik nije blokiran)
                resetirajKrivePrijave($korime); // krive lozinke se stavljaju na 0
                $session = new Session();
                $session->kreirajSesiju($korime, dohvatiTipKorisnika($korime), dohvatiIdKorisnik($korime));
                $session->kreirajCookie($korime);
                dnevnik::prijava($korime, 1);
                header("Location: korisniciPocetna.php");
            } else {
                // poruka da je korisnik blokiran
                $greska .= 'Korisnik blokiran!';
                dnevnik::prijava($korime, 0);
            }
        } else {
            // poruka da je lozinka kriva
            povecajKrivePrijave($korime);
            $greska .= 'Kriva lozinka!';
            dnevnik::prijava($korime, 0);
        }
    } else {
        //korisnicko ime ne postoji
        $greska .= 'korisnicko ime ne postoji ili nije aktiviran racun!';
    }
}

// zaboravljena lozinka
if (isset($_GET["data"])) {
    if ($_GET["data"] == "zaboravljenaLozinka") {
        if ($_GET["korime"] != "") {
            include_once './okviri/provjerePrijava.php';
            $korime = $_GET["korime"];
            if (postojiKorime($korime)) { // promjena lozinke, slanje na mail nove lozinke
                $novaLozinka = substr(md5(rand()), 0, 20);
                promjeniLozinu($korime, $novaLozinka); // mail se salje u funckiji
            } else {
                // upisano ime ali ne postoji
                $greska .= 'Korisncko ime ne postoji';
            }
        } else {
            // korisnicko ime nije upisano
            $greska .= 'Ako zelite promjeniti lozinku morate upisati korime i pokusat se prijavit te ako ne uspije stisnuti na zaboravljena lozinka';
        }
    }
}

if ($greska != "") {
    $ispisGreska = "<div class='isa_error'>$greska</div>";
}


require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
include_once './okviri/oglas.php';
$smarty->assign('prijavaPoz1', $prijavaPoz1);
$smarty->assign('prijavaPoz2', $prijavaPoz2);
$smarty->assign('prijavaPoz3', $prijavaPoz3);
$smarty->assign('korimeZab', $korimeZaboravljenaLozinka);
$smarty->assign('naslov', "Prijava");
$smarty->assign('slanje', $slanje);
$smarty->assign('ispisGreska', $ispisGreska);
$smarty->display('predlosci/nePrijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/prijava.tpl');
$smarty->display('predlosci/footer.tpl');
$baza->zatvoriDB();
?>