window.onload = function () {
    document.getElementById("unesiVrstuOglasa").addEventListener("submit", function (event) {
        var idPozicije = document.getElementById("id_pozicija").value;
        var trajanje = document.getElementById("trajanje").value;
        var brzina = document.getElementById("brzina_izmjene").value;
        var cijena = document.getElementById("cijena").value; // ||  &&  !isFinite(brzina) && !isFinite(cijena)
        if (trajanje == "" || brzina == "" || cijena == "" || idPozicije == "== Odaberi poziciju ==") {
            alert("Polja moraju biti unesena");
            event.preventDefault();
        }
        if (!isFinite(brzina) || !isFinite(trajanje) || !isFinite(cijena)) {
            alert("Polja biti u pravilnom formatu");
            event.preventDefault();
        }
    });
};