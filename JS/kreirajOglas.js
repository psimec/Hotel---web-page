window.onload = function () {
    document.getElementById("unosOglasa").addEventListener("submit", function (event) {
        var naziv = document.getElementById("naziv").value;
        var opis = document.getElementById("opis").value;
        var url = document.getElementById("url").value;
        var userfile = document.getElementById("userfile").value;
        var vrsteOglasa = document.getElementById("vrsta_oglasa").value;
        
        if (naziv == "" || opis == "" || url == "" || userfile == "" || vrsteOglasa == "") {
            alert("Sva polja moraju biti unesena!");
            event.preventDefault();
        }
    });
};