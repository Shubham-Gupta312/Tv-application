<?= $this->extend('admin/snippet.php'); ?>
<?= $this->section('content'); ?>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- Add data Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form id="formId" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Product ID</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" id="prod_id" name="prod_id">
                                                    <div class="invalid-feedback" class="text-danger" id="prod_id_msg">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Product Name</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" id="prod_name"
                                                        name="prod_name">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="prod_name_msg">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="expiryDate" class="form-label">Product Price</label>
                                                    <span class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="prod_price"
                                                        id="prod_price">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="prod_price_msg">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="expiryDate" class="form-label">Product
                                                        Description</label>
                                                    <!-- <span class="text-danger">*</span> -->
                                                    <textarea name="prod_desc" id="prod_desc" cols="30"
                                                        style="background: #272b34; color: #b2b9bf;"></textarea>
                                                    <!-- <div class="invalid-feedback" class="text-danger"
                                                        id="prod_desc_msg">
                                                    </div> -->
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Product Image</label><span
                                                        class="text-danger">*</span>
                                                    <input type="file" class="form-control" id="prod_img"
                                                        name="prod_img" accept="image/*">
                                                    <div class="invalid-feedback" class="text-danger" id="prod_img_msg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="save" name="save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update data Modal -->
                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form id="formId" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="productUpdateId" id="productUpdateId">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Product ID</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" id="Uprod_id"
                                                        name="Uprod_id">
                                                    <div class="invalid-feedback" class="text-danger" id="Uprod_id_msg">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Product Name</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" id="Uprod_name"
                                                        name="Uprod_name">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="Uprod_name_msg">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="expiryDate" class="form-label">Product Price</label>
                                                    <span class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="Uprod_price"
                                                        id="Uprod_price">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="Uprod_price_msg">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="expiryDate" class="form-label">Product
                                                        Description</label>
                                                    <!-- <span class="text-danger">*</span> -->
                                                    <textarea name="Uprod_desc" id="Uprod_desc" cols="30"
                                                        style="background: #272b34; color: #b2b9bf;"></textarea>
                                                    <!-- <div class="invalid-feedback" class="text-danger"
                                                        id="prod_desc_msg">
                                                    </div> -->
                                                </div>
                                                <!-- <div class="mb-3">
                                                    <label for="title" class="form-label">Product Image</label><span
                                                        class="text-danger">*</span>
                                                    <input type="file" class="form-control" id="Uprod_img"
                                                        name="Uprod_img" accept="image/*">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="Uprod_img_msg">
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="update_data" name="update_data">Save
                                    Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-row">
                        <div class="title">
                            Products
                        </div>
                        <div class="add-program">
                            <button class="btn btn-info" id="add" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Add Product</button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Table -->
                <table class="table-bordered table-hover mt-4" id="productTable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="products">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Data Table
    var table = $('#productTable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax: {
            url: "<?= base_url('api/fetch_product') ?>",
            type: "GET"
        },
        drawCallback: function (settings) {
            // console.log('Table redrawn:', settings);
            // table.rows().every(function (index, element) {
            //     // Get data for the row (including hidden columns)
            //     // var rowData = this.data();
            //     // // console.log(rowData[3]);
            //     // var rowNode = this.node();
            //     // Apply CSS style to the fourth column
            //     // var sixthColumn = $(rowNode).find('td:eq(6)');
            //     // sixthColumn.css('display', 'flex').children().css('margin-right', '10px'); 
            // });
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
            url: "<?= base_url('admin/add_product') ?>",
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
            url: '<?= base_url('admin/setActiveStatus') ?>',
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
            url: "<?= base_url('admin/delete_product') ?>",
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
            url: "<?= base_url('admin/edit_data') ?>",
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
            url: "<?= base_url('admin/update_data') ?>",
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
</script>
<?= $this->endSection() ?>