window.onload = function () {
    document.getElementById("kreirajPozicijuOglasa").addEventListener("submit", function (event) {
        var moderator = document.getElementById("moderator").value;
        var stranica = document.getElementById("stranica").value;
        var visina = document.getElementById("visina").value;
        var sirina = document.getElementById("sirina").value;

        if (!isFinite(visina) || !isFinite(sirina)) {
            alert("Polja brojeva moraju biti u pravilnom formatu");
            event.preventDefault();
        }
        
        if (sirina == "" || visina == "" || stranica == "== Odaberi stranicu ==" || moderator == "== Odaberi moderatora =="  ) {
            alert("Polja moraju biti unesena");
            event.preventDefault();
        }
    });
};
