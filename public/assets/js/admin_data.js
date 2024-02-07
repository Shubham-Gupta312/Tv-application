var table = $('#myTable').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    ajax: {
        url: "/api/admin_info",
        type: "GET",
        error: function (xhr, error, thrown) {
            console.log("AJAX error:", xhr, error, thrown);
        }
    },
    drawCallback: function (settings) {
        // console.log('Table redrawn:', settings);
    }
});