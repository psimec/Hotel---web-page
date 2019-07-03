$(document).ready(function () {
    $('#sobeTablica').dataTable({
        "aaSorting": [[0, "asc"], [1, "asc"], [2, "asc"], [3, "asc"], [4, "asc"]],
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": true
    });
});