window.onload = function () {
    document.getElementById("unosSobe").addEventListener("submit", function (event) {
        var userfile = document.getElementById("userfile").value;
        var vrsteOglasa = document.getElementById("broj_lezaja").value;
        var velicinaSobe = document.getElementById("velicina_sobe").value;
        if (userfile == "" || vrsteOglasa == "" || velicinaSobe == "== Odaberi naziv oglasa ==") {
            alert("Polja moja biti unesena");
            event.preventDefault();
        }
    });
};

