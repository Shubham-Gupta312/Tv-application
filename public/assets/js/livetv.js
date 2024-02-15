// data table
var table = $('#liveTvTable').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    ajax: {
        // url: "<?= base_url('api/retrive_livetv') ?>",
        url: "/api/retrive_livetv",
        type: "GET"
    },
    drawCallback: function (settings) {
        // console.log('Table redrawn:', settings);
    }
});
// update and add url
$(document).ready(function () {
    $('#save').click(function (e) {
        e.preventDefault();
        let formData = $('#formId').serialize();

        // Check if live TV URL already exists
        let existingUrl = $('#liveTvUrl').val();
        if (existingUrl) {
            // If URL exists, send AJAX request to update it
            updateLiveTvUrl(formData);
        } else {
            // If URL does not exist, send AJAX request to add it
            addLiveTvUrl(formData);
        }
    });

    function addLiveTvUrl(formData) {
        $.ajax({
            method: "POST",
            url: '/admin/add_livetv',
            data: formData,
            success: function (response) {
                // console.log(response);
                handleResponse(response);
                if (response.status == 'success') {
                    table.ajax.reload(null, false);
                }
            }
        });
    }

    function updateLiveTvUrl(formData) {
        $.ajax({
            method: "POST",
            url: '/admin/update_livetv', // Update URL endpoint
            data: formData,
            success: function (response) {
                // console.log(response);
                handleResponse(response);
                if (response.status == 'success') {
                    table.ajax.reload(null, false);
                }
            }
        });
    }

    function handleResponse(response) {
        $('input').removeClass('is-invalid');
        if (response.status == 'success') {
            $('input').val('');
            $('#exampleModal').modal('hide');
        } else {
            let error = response.errors;
            for (const key in error) {
                document.getElementById(key).classList.add('is-invalid');
                document.getElementById(key + '_msg').innerHTML = error[key];
            }
        }
    }
});
