<?php
    include_once '../klase/baza.class.php';
    $baza = new Baza();
    $baza->spojiDB();
    
    $sql = "SELECT korisnicko_ime, ime, prezime, email, lozinka, naziv FROM korisnik NATURAL JOIN tip_korisnika";
    $r = $baza->selectDB($sql);
    
    echo "<table>"
            . "<tr><th>Korisničko ime:</th>"
            . "<th>Lozinka:</th>"
            . "<th>Ime:</th>"
            . "<th>Prezime:</th>"
            . "<th>Email:</th>"
            . "<th>Tip:</th></tr>";
    while($red = mysqli_fetch_array($r)){
        echo "<tr>";
        echo "<td>".$red["korisnicko_ime"]."</td>";
        echo "<td>".$red["lozinka"]."</td>";
        echo "<td>".$red["ime"]."</td>";
        echo "<td>".$red["prezime"]."</td>";
        echo "<td>".$red["email"]."</td>";
        echo "<td>".$red["naziv"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    $baza->zatvoriDB();
?>

