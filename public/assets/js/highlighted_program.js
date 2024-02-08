// Data Table
var table = $('#myTable').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    ajax: {
        url: "/api/retrive_data",
        type: "GET"
    },
    drawCallback: function (settings) {
        // console.log('Table redrawn:', settings);
    }
});
// open modal, save and fetch data
$(document).ready(function () {
    $('#save').click(function (e) {
        e.preventDefault();
        // console.log('clicked');
        let formData = $('#formId').serialize();
        // console.log(formData);
        $.ajax({
            method: "POST",
            url: "/admin/add_highlighted",
            data: formData,
            dataType: "json",
            success: function (response) {
                $('input').removeClass('is-invalid');
                if (response.status == 'success') {
                    // $('input').val('');
                    $('#exampleModal').modal('hide');
                    // console.log(response);
                } else {
                    let error = response.errors;
                    // console.log(error);
                    for (const key in error) {
                        // console.log(key);
                        // console.log(key, error[key]);
                        document.getElementById(key).classList.add('is-invalid');
                        document.getElementById(key + '_msg').innerHTML = error[key];
                    }
                }
            }
        });
    });
});

// Set active and Inactive status
// Function to set button styles based on product status
function setButtonStyles(button, status) {
    if (status === 1) {
        button.removeClass('btn-danger').addClass('btn-success').html('<i class="bi bi-check-lg"></i>');
    } else {
        button.removeClass('btn-success').addClass('btn-danger').html('<i class="bi bi-x"></i>');
    }
}
// Click event handler for the '.active' buttons
var table = $('#myTable').DataTable();
$(document).on('click', '.active', function () {
    // console.log('clicked');
    var button = $(this);
    var data = table.row(button.closest('tr')).data();
    var programId = data[0]; // Assuming the product ID is in the first column
    // console.log(programId);

    $.ajax({
        method: 'POST',
        url: "/admin/setHighlightActiveStatus",
        data: {
        'id': programId,
    },
        dataType: 'json',
        success: function (response) {
            // console.log(response);

            if (response.status === 'success') {
                // Toggle the status for UI update
                var newStatus = response.newStatus;
                // console.log('Product status changed to', (newStatus === 1) ? 'Active' : 'Inactive', 'successfully.');

                // Update the button style
                setButtonStyles(button, newStatus);

            } else {
                console.error('Failed to update product status.');
            }
        },
        error: function (error) {
            console.error('AJAX Error:', error);
        }
        });
    });

// Delete function
$(document).on('click', '#delete', function (e) {
    e.preventDefault();
    // console.log('clicked');
    var button = $(this);
    var data = table.row(button.closest('tr')).data();
    var programId = data[0]; // Assuming the product ID is in the first column
    // console.log(programId);
    $.ajax({
        method: "POST",
        url: "/admin/delete_HighlightProgram",
        data: {
            'id': programId
        },
        success: function (response) {
            // console.log(response);
            if (response.status == 'success') {
                // Refresh the table using Ajax after successful operation
                table.ajax.reload(null, false);
            } else {
                console.error('Failed to update product status.');
            }
        }
    });
});

// Edit and Update function
$(document).on('click', '#update', function (e) {
    e.preventDefault();
    // console.log('clicked');
    var button = $(this);
    var data = table.row(button.closest('tr')).data();
    var programId = data[0];
    // console.log(programId);
    $('#productUpdateId').val(programId);
    $.ajax({
        method: "POST",
        url: "/admin/edit_HighlightProgramData",
        data: {
            'id': programId,
        },
        success: function (response) {
            // console.log(response);
            var VideoTitle = response.data.video_title;
            var VideoURL = response.data.video_url;
            // console.log(product_id);

            // initalise the value to input feild
            $('#Uvideo_title').val(VideoTitle);
            $('#Uvideo_url').val(VideoURL);
        }
    });
});

// Update the data function
$('#update_data').click(function (e) {
    e.preventDefault();
    // console.log('clicked');
    var data = {
        'id': $('#productUpdateId').val(),
        'prog_title': $('#Uvideo_title').val(),
        'prog_url': $('#Uvideo_url').val(),
    };
    $.ajax({
        method: "POST",
        url: "/admin/update_HighlightProgramData",
        data: data,
        success: function (response) {
            // console.log(response);
            if (response.status == 'success') {
                $('#updateModal').modal('hide');
                // location.reload();
                table.ajax.reload(null, false);
            }
        }
    });
});