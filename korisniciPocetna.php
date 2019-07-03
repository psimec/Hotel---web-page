<?PHP
$moderator = "";
$korisnik = "";
session_start();
if (!isset($_SESSION["korime"]) || !isset($_SESSION["tip"])) {
    header("Location: ./okviri/error.php?e=2");
    exit();
} 
if ($_SESSION["tip"] == 1) {
    $korisnik = 'hidden';
}

if ($_SESSION["tip"] == 2) {
    $moderator = 'hidden';
}

$korime = $_SESSION["korime"];

$googleMap = "
<div class='index'><h2 style='margin-left: 47%;'>Naši hoteli</h2><hr width='30%'><br/><br/></div>
<div id='map'></div>
<script>
    function initMap() {
        var zagreb = {lat: 45.812001, lng: 15.981919};
        var turistHotel = {lat: 46.303204, lng: 16.337048};
        var parkBoutique = {lat: 46.68932, lng: 16.116575};
        var hotelAntunović = {lat: 45.797323, lng: 15.899529};
        var esplanadeZagrebHotel = {lat: 45.805304, lng: 15.976012};
        var theWestinZagreb = {lat: 45.806839, lng: 15.966134};
        var hotelJägerhorn = {lat: 45.81318, lng: 15.973731};
        var palaceHotelZagreb = {lat: 45.808561, lng: 15.977698};
        var hotelAstoria = {lat: 45.807134, lng: 15.980585};
        var hotel9 = {lat: 45.802809, lng: 15.994838};
        var hotelAcademia = {lat: 45.819229, lng: 15.976601};
        var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 14, center: zagreb});
        var marker = new google.maps.Marker({position: turistHotel, map: map, label: { text: 'Turist Hotel' }});
        var marker = new google.maps.Marker({position: parkBoutique, map: map, label: { text: 'Park Boutique Hotel' }});
        var marker = new google.maps.Marker({position: hotelAntunović, map: map, label: { text: 'Hotel Antunović' }});
        var marker = new google.maps.Marker({position: esplanadeZagrebHotel, map: map,  label: { text: 'Esplanade Zagreb Hotel' }});
        var marker = new google.maps.Marker({position: theWestinZagreb, map: map,  label: { text: 'The Westin Zagreb' }});
        var marker = new google.maps.Marker({position: hotelJägerhorn, map: map,  label: { text: 'Hotel Jägerhorn' }});
        var marker = new google.maps.Marker({position: palaceHotelZagreb, map: map,  label: { text: 'Palace Hotel Zagreb' }});
        var marker = new google.maps.Marker({position: hotelAstoria, map: map,  label: { text: 'Best Western Premier Hotel Astoria ' }});
        var marker = new google.maps.Marker({position: hotel9, map: map,  label: { text: 'Hotel 9' }});
        var marker = new google.maps.Marker({position: hotelAcademia, map: map,  label: { text: 'Hotel Academia' }});
    }
</script>

<script async defer
        src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCCqzRmXG_t65j3NRSk31iSvUP3zDTrVkw&callback=initMap'>
</script>";

require 'vanjske_biblioteke/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->assign('korisnik', $korisnik);
$smarty->assign('pozdravKorisniku', $korime);
$smarty->assign('moderator', $moderator);
$smarty->assign('googleMap', $googleMap);
$smarty->assign('naslov', "Dobro došli na korisničku početnu stranicu");
$smarty->display('predlosci/prijavljeniHeader.tpl');
$smarty->display('stranice_predlosci/korisnikPocetna.tpl');
$smarty->display('predlosci/footer.tpl');
?>