var table = $('#enqProduct').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    "iDisplayLength": 5,
    "pageLength": 5,
    "aLengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
    "fnCreatedRow": function (row, data, index){
        var pageInfo = table.page.info();
        var currentPage = pageInfo.page;
        var pageLength = pageInfo.length;
        var rowNumber = index + 1 + (currentPage * pageLength);
        $('td', row).eq(0).html(rowNumber);
    },
    ajax: {
        // url: "<?= base_url('api/fetch_enquiryProduct') ?>",
        url: "/api/fetch_enquiryProduct",
        type: "GET",
    },
    drawCallback: function (settings) {
        // console.log('Table redrawn:', settings);
    },
});