$(document).ready(function() {
    //inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function () {
        $('.alert').hide();
    })


});


