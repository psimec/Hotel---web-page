window.onload = function () {
    document.getElementById("kreirajHotel").addEventListener("submit", function (event) {
        var slika = document.getElementById("userfile").value;
        var naziv = document.getElementById("naziv").value;
        var ulica = document.getElementById("ulica").value;
        var grad = document.getElementById("grad").value;
        var drzava = document.getElementById("drzava").value;
        var oib = document.getElementById("oib").value;
        var email = document.getElementById("email").value;
        var zvjezdice = document.getElementById("zvjezdice").value;
        var opis = document.getElementById("opis").value;
        var moderator = document.getElementById("moderator").value;

        var re = new RegExp(/^\w+.?\w+@\w+\.[a-zA-Z]{2,}$/);
        if (!(re.test(email) && email.length >= 5 && email.length <= 30))
        {
            alert("Email nije u dobrom formatu");
            event.preventDefault();
        }

        if (!isFinite(oib) || !isFinite(zvjezdice)) {
            alert("Polja brojeva moraju biti u pravilnom formatu");
            event.preventDefault();
        }
        
        if (moderator == "" ) {
            alert("Mora biti odabran barem jedan moderator");
        }
        
        if (slika == "" || naziv == "" || ulica == "" || naziv == "" || grad == "" || drzava == "" || oib == "" || email == "" || zvjezdice == "" || opis == "" ) {
            alert("Polja moraju biti unesena");
            event.preventDefault();
        }
    });
};