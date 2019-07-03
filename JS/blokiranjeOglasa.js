window.onload = function () {
    document.getElementById("blokiranjeOglasa").addEventListener("submit", function (event) {
        var opis = document.getElementById("opis");
        var imeOglasa = document.getElementById("ime_oglasa");
        if (opis.value == "" || imeOglasa.value == "== Odaberi naziv oglasa ==") {
            alert("Polja moja biti unesena");
            event.preventDefault();
        }
    });
};