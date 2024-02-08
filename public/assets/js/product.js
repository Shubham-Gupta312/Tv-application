// Data Table
var table = $('#productTable').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    ajax: {
        url: "/api/fetch_product",
        type: "GET"
    },
    drawCallback: function (settings) {
        // console.log('Table redrawn:', settings);
    }
});

// open modal, save and fetch data
$('#save').click(function (e) {
    e.preventDefault();
    // console.log('clicked');
    // let formData = $('#formId').serialize();
    let formData = new FormData($('#formId')[0]);
    // console.log(formData);
    $.ajax({
        method: "POST",
        url: "/admin/add_product",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        success: function (response) {
            $('input').removeClass('is-invalid');
            if (response.status == 'success') {
                // $('input').val('');
                $('#exampleModal').modal('hide');
                table.ajax.reload(null, false);
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
// Function to set button styles based on product status
function setButtonStyles(button, status) {
    if (status === 1) {
        button.removeClass('btn-danger').addClass('btn-success').html('<i class="bi bi-check-lg"></i>');
    } else {
        button.removeClass('btn-success').addClass('btn-danger').html('<i class="bi bi-x"></i>');
    }
}
// Click event handler for the '.active' buttons
var table = $('#productTable').DataTable();
$(document).on('click', '.active', function () {
    var button = $(this);
    var data = table.row(button.closest('tr')).data();
    var productId = data[0]; // Assuming the product ID is in the first column
    // console.log(productId);

    $.ajax({
        method: 'POST',
        url: "/admin/setActiveStatus",
        data: {
        'id': productId,
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
    var productId = data[0]; // Assuming the product ID is in the first column
    // console.log(productId);
    $.ajax({
        method: "POST",
        url: "/admin/delete_product",
        data: {
            'id': productId
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
// edit function
$(document).on('click', '#update', function (e) {
    e.preventDefault();
    // console.log('clicked');
    var button = $(this);
    var data = table.row(button.closest('tr')).data();
    var productId = data[0];
    // console.log(productId);
    $('#productUpdateId').val(productId);
    $.ajax({
        method: "POST",
        url: "/admin/edit_data",
        data: {
            'id': productId,
        },
        success: function (response) {
            // console.log(response);
            var product_id = response.data.prod_id;
            var product_name = response.data.prod_name;
            var product_price = response.data.prod_price;
            var product_desc = response.data.prod_desc;
            var product_image = response.data.prod_img;
            // console.log(product_id);

            // initalise the value to input feild
            $('#Uprod_id').val(product_id);
            $('#Uprod_name').val(product_name);
            $('#Uprod_price').val(product_price);
            $('#Uprod_desc').val(product_desc);
            // // Set the image source attribute to display the product image
            // $('#prod_img').attr('src', product_image);
        }
    });
});

// Update Product Data
$('#update_data').click(function (e) {
    e.preventDefault();
    // console.log('clicked');
    var data = {
        'id': $('#productUpdateId').val(),
        'prod_id': $('#Uprod_id').val(),
        'prod_name': $('#Uprod_name').val(),
        'prod_price': $('#Uprod_price').val(),
        'prod_desc': $('#Uprod_desc').val(),
    };
    $.ajax({
        method: "POST",
        url: "/admin/update_data",
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