var table = $('#enqProduct').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    ajax: {
        // url: "<?= base_url('api/fetch_enquiryProduct') ?>",
        url: "/api/fetch_enquiryProduct",
        type: "GET",
    },
    drawCallback: function (settings) {
        // console.log('Table redrawn:', settings);
    },
});