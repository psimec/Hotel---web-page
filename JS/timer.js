$(document).ready(function () {
    $(".oglasSlika1").click(function () {
        var podaci = this.name;
        var podaci = podaci.split(",");
        var idOglas = podaci[1];
        $.ajax({
            url: './okviri/ajax.php',
            type: 'POST',
            async: false,
            data: {idOglas: idOglas},
            success: function (data) {

            },
            error: function (errorData) {
                alert("Error" + errorData);
            }
        });
    });

    $(".oglasSlika2").click(function () {
        var podaci = this.name;
        var podaci = podaci.split(",");
        var idOglas = podaci[1];
        $.ajax({
            url: './okviri/ajax.php',
            type: 'POST',
            async: false,
            data: {idOglas: idOglas},
            success: function (data) {

            },
            error: function (errorData) {
                alert("Error" + errorData);
            }
        });
    });

    $(".oglasSlika3").click(function () {
        var podaci = this.name;
        var podaci = podaci.split(",");
        var idOglas = podaci[1];
        $.ajax({
            url: './okviri/ajax.php',
            type: 'POST',
            async: false,
            data: {idOglas: idOglas},
            success: function (data) {

            },
            error: function (errorData) {
                alert("Error" + errorData);
            }
        });
    });
});

// dodati dio ako je oglas istekao

var brojac1 = 0;
var brojac2 = 0;
var brojac3 = 0;

start1();
start2();
start3();

function stop() {
    clearTimeout(timer);
}

function start1() {
    var oglasi = $(".oglasSlika1");
    var trajanje = 2;
    if (oglasi.length > 0) {
        for (var i = 0; i < oglasi.length; i++) {
            oglasi[i].style.visibility = "hidden";
            oglasi[i].style.display = "none";
        }

        brojac1++;
        if (brojac1 > oglasi.length) {
            brojac1 = 1;
        }
        oglasi[brojac1 - 1].style.visibility = "visible";
        oglasi[brojac1 - 1].style.display = "block";
        var nameVrijednost = oglasi[brojac1 - 1].name;
        var podaci = nameVrijednost.split(",");
        trajanje = podaci[0];
    }

    setTimeout(function () {
        start1();
    }, trajanje * 1000);
}

function start2() {
    var oglasi = $(".oglasSlika2");
    var trajanje = 2;
    if (oglasi.length > 0) {
        for (var i = 0; i < oglasi.length; i++) {
            oglasi[i].style.visibility = "hidden";
            oglasi[i].style.display = "none";
        }
        brojac2++;
        if (brojac2 > oglasi.length) {
            brojac2 = 1;
        }
        oglasi[brojac2 - 1].style.visibility = "visible";
        oglasi[brojac2 - 1].style.display = "block";
        var nameVrijednost = oglasi[brojac2 - 1].name;
        var podaci = nameVrijednost.split(",");
        trajanje = podaci[0];
    }

    setTimeout(function () {
        start2();
    }, trajanje * 1000);
}

function start3() {
    var oglasi = $(".oglasSlika3");
    var trajanje = 2;
    if (oglasi.length > 0) {
        for (var i = 0; i < oglasi.length; i++) {
            oglasi[i].style.visibility = "hidden";
            oglasi[i].style.display = "none";
        }
        brojac3++;
        if (brojac3 > oglasi.length) {
            brojac3 = 1;
        }
        oglasi[brojac3 - 1].style.visibility = "visible";
        oglasi[brojac3 - 1].style.display = "block";
        var nameVrijednost = oglasi[brojac3 - 1].name;
        var podaci = nameVrijednost.split(",");
        trajanje = podaci[0];
    }

    setTimeout(function () {
        start3();
    }, trajanje * 1000);
}

