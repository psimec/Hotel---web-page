window.onload = function () {
    if (!kolacicPostoji("uvjeti koristenja"))
    {
        var r = confirm("Prihvaćam uvjete korištenja");
        var expire = Date.now();
        if (r == true) {
            var danas = new Date();
            var istice = new Date();
            istice.setTime(danas.getTime() + 2 * 24 * 60 * 60 * 1000);
            document.cookie = "uvjeti koristenja" + "; expires=" + istice.toGMTString() + ";";
        } else {
            // u slučaju da nisu prihvaćeni uvjeti
        }
    }
}

function kolacicPostoji(imeKolacica)
{
    var kolacici = document.cookie;
    if (kolacici.length > 0)
    {
        var pocetak = kolacici.indexOf(imeKolacica);
        if (pocetak !== -1)
        {
            return true;
        } else
        {
            return false;
        }
    } else
    {
        return false;
    }
}
