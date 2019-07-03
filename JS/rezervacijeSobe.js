window.onload = function () {
    document.getElementById("unesiRezervaciju").addEventListener("submit", function (event) {
        var datum = document.getElementById("datum");
        var vrijeme = document.getElementById("vrijeme");
        var soba = document.getElementById("broj_sobe");
        var korisnik = document.getElementById("korisnik");
        var trajanje = document.getElementById("trajanje").value;
        if (!isNaN(trajanje || trajanje == "" )) {
            if (datum.value == "" || vrijeme.value == "" || soba.value == "== Odaberi sobu ==" || korisnik.value == "== Odaberi korisnika ==") {
                alert("Polja moja biti unesena");
                event.preventDefault();
            }
        } else {
            alert("Trajanje mora biti broj");
            event.preventDefault();
        }
    });
};
