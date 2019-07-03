$(document).ready(function () {
    $("#podaci").change(function () {
        var odabrani = $('#podaci').val();
        var visina;
        var sirina;
        $.ajax({
            url: './okviri/ajax.php',
            type: 'POST',
            async: false,
            data: {idPozicija: odabrani},
            success: function (data) {
                var podaci = data.split(",");
                visina = podaci[0];
                sirina = podaci[1];
                $('#visina').val(visina);
                $('#sirina').val(sirina);
            },
            error: function (errorData) {
                alert("Error" + errorData);
            }
        });
    });

    $("#urediPozicijuOglasa").submit(function () {
        var visina = $('#visina').val();
        var sirina = $('#sirina').val();

        if (visina == "" || sirina == "") {
            alert("Polja moraju biti unesena");
            event.preventDefault();
        }

        if (!isFinite(visina) || !isFinite(sirina)) {
            alert("Polja moraju biti u pravilnom formatu");
            event.preventDefault();
        }
    });
});