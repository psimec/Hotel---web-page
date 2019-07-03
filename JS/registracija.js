window.onload = function () {
    
    document.getElementById("ime").addEventListener("keyup", function () {
        provjeriZnakove(document.getElementById("ime", event));
    });
    document.getElementById("prezime").addEventListener("keyup", function () {
        provjeriZnakove(document.getElementById("prezime"));
    });
    document.getElementById("korime").addEventListener("keyup", function () {
        provjeriZnakove(document.getElementById("korime"));
    });
    document.getElementById("ulica").addEventListener("keyup", function () {
        provjeriZnakove(document.getElementById("ulica"));
    });
    document.getElementById("grad").addEventListener("keyup", function () {
        provjeriZnakove(document.getElementById("grad"));
    });
    document.getElementById("drzava").addEventListener("keyup", function () {
        provjeriZnakove(document.getElementById("drzava"));
    });
    document.getElementById("email").addEventListener("keyup", function () {
        provjeriZnakove(document.getElementById("email"));
    });
    document.getElementById("lozinka").addEventListener("keyup", function () {
        provjeriZnakove(document.getElementById("lozinka"));
    });
    document.getElementById("ponovljena_lozinka").addEventListener("keyup", function () {
        provjeriZnakove(document.getElementById("ponovljena_lozinka"));
    });

    document.getElementById("korime").addEventListener("change", function () {
        provjeriKorime();
    });

    document.getElementById("ponovljena_lozinka").addEventListener("change", function () {
        provjeriLozinke();
    });

    document.getElementById("email").addEventListener("change", function () {
        provjeriEmail();
    });

    document.getElementById("korime").addEventListener("change", function () {
        ajaxKorime();
    });

    document.getElementById("registracija").addEventListener("submit", function (event) {
        if (!(provjeriTextPolja() && provjeriLozink() && provjeriKorime() && provjeriEmail()) || !ajaxKorime()) { // ajax ne radi dobro kod slanja
            event.preventDefault();
        }
    });
};

function provjeriZnakove(element) {
    if (element.value[element.value.length - 1] === "'" || element.value[element.value.length - 1] === "?" || element.value[element.value.length - 1] === "!" || element.value[element.value.length - 1] === "#") {
        alert("nedozvoljen znak");
    }
}

function ajaxKorime() { // provjera preko ajaxa je li je korime u bazi
    var provjera;
    var korime = document.getElementById("korime").value;
    var idKorisnik = "";

    if (korime != "") {
        $.ajax({
            url: './okviri/ajax.php',
            type: 'POST',
            async: false,
            data: {korisnik: korime},
            success: function (data) {
                idKorisnik = data;
            },
            error: function (errorData) {
                alert("Error" + errorData);
            }
        });

        if (idKorisnik != "") { // ako je vracena vrijednost prazna, korisnik je dobar, ako nije prazna znaci da ima id u bazi te provjera nije dobra
            document.getElementById("korime").style.backgroundColor = "red";
            alert("Korisničko ime već postoji")
            provjera = false;
        } else {
            document.getElementById("korime").style.backgroundColor = "white";            
            provjera = true;
        }
    }else{
        provjera = false;
    }
    return provjera;
}

function provjeriTextPolja()
{
    var podaci = document.forms["registracija"].getElementsByTagName("input");
    var provjera = true;
    for (var i = 0; i < podaci.length; i++)
    {
        if (podaci[i].type === "text" || podaci[i].type === "email" || podaci[i].type === "password")
        {
            if (podaci[i].value === "" || podaci[i].value.includes("'") || podaci[i].value.includes("?") || podaci[i].value.includes("!") || podaci[i].value.includes("#"))
            {
                document.getElementById(podaci[i].id).style.backgroundColor = "red";
                podaci[i].style.backgroundColor = "red";
                provjera = false;
            } else {
                document.getElementById(podaci[i].id).style.backgroundColor = "white";
            }
        }
    }
    return provjera;
}

function provjeriLozinke() {
    var provjera = true;
    var lozinka = document.getElementById("lozinka").value;
    var ponovljenaLozinka = document.getElementById("ponovljena_lozinka").value;
    if (lozinka === ponovljenaLozinka) {
        document.getElementById("ponovljena_lozinka").style.backgroundColor = "white";
        document.getElementById("lozinka").style.backgroundColor = "white";
        provjera = true;

    } else {
        alert("Lozinke nisu jednake!");
        document.getElementById("lozinka").style.backgroundColor = "red";
        document.getElementById("ponovljena_lozinka").style.backgroundColor = "red";
        provjera = false;
    }
    return provjera;
}

function provjeriKorime() {
    var provjera = true;
    var korime = document.getElementById("korime").value;
    if (korime.length > 2) {
        document.getElementById("korime").style.backgroundColor = "white";
        provjera = true;

    } else
    {
        alert("Korisničko ime mora imat više od 2 znaka");
        document.getElementById("korime").style.backgroundColor = "red";
        provjera = false;
    }
    return provjera;
}

function provjeriEmail() {
    var provjera = true;
    var email = document.getElementById("email").value;
    var re = new RegExp(/^\w+.?\w+@\w+\.[a-zA-Z]{2,}$/);
    if (re.test(email)) {
        document.getElementById("email").style.backgroundColor = "white";
        provjera = true;
    } else {
        alert("Email nije dobrog oblika");
        document.getElementById("email").style.backgroundColor = "red";
        provjera = false;
    }
    return provjera;
}