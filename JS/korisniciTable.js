$(document).ready(function () {
    $('#sobeTablica').dataTable({
        "aaSorting": [[0, "asc"], [1, "asc"]],
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": true
    });
});