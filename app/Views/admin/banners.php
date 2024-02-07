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
                <!--Add Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form id="formId" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Banner Name</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" id="banner_name"
                                                        name="banner_name">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="banner_name_msg">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Banner Image</label><span
                                                        class="text-danger">*</span>
                                                    <input type="file" class="form-control" id="banner_img"
                                                        name="banner_img" accept="image/*">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="banner_img_msg">
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
                                <h5 class="modal-title" id="exampleModalLabel">Update Banner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form id="formId">
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="productUpdateId" id="productUpdateId">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Banner Name</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" id="Ubanner_name"
                                                        name="Ubanner_name">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="Ubanner_name_msg">
                                                    </div>
                                                </div>
                                                <!-- <div class="mb-3">
                                                    <label for="title" class="form-label">Banner Image</label><span
                                                        class="text-danger">*</span>
                                                    <input type="file" class="form-control" id="Ubanner_img"
                                                        name="Ubanner_img" accept="image/*">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="Ubanner_img_msg">
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
                            Banner's
                        </div>
                        <div class="add-banner">
                            <button class="btn btn-info" id="add" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Add Banner</button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Table -->
                <table class="table-bordered table-hover mt-4" id="bannerTable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Banner Name</th>
                            <th>Banner Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="BannerInfo">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Data Table
    var table = $('#bannerTable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax: {
            url: "<?= base_url('api/fetch_banner') ?>",
            type: "GET",
            error: function (xhr, error, thrown) {
                console.log("AJAX error:", xhr, error, thrown);
            }
        },
        drawCallback: function (settings) {
            // console.log('Table redrawn:', settings);
            table.rows().every(function (index, element) {
                // Get data for the row (including hidden columns)
                var rowData = this.data();
                // console.log(rowData[3]);
                var rowNode = this.node();
                // Apply CSS style to the fourth column
                var fourthColumn = $(rowNode).find('td:eq(3)');
                fourthColumn.css('display', 'flex').children().css('margin-right', '10px');
            });
        }
    });
    // open modal, save and fetch data
    $(document).ready(function () {
        $('#save').click(function (e) {
            e.preventDefault();
            // console.log('clicked');
            let formData = new FormData($('#formId')[0]);
            // console.log(formData);
            $.ajax({
                method: "POST",
                url: "<?= base_url('admin/add_banner') ?>",
                processData: false,
                contentType: false,
                data: formData,
                dataType: "json",
                success: function (response) {
                    $('input').removeClass('is-invalid');
                    if (response.status == 'success') {
                        $('input').val('');
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
    });

    // active or inactive status
    // Function to set button styles based on product status
    function setButtonStyles(button, status) {
        if (status === 1) {
            button.removeClass('btn-danger').addClass('btn-success').html('<i class="bi bi-check-lg"></i>');
        } else {
            button.removeClass('btn-success').addClass('btn-danger').html('<i class="bi bi-x"></i>');
        }
    }
    // Click event handler for the '.active' buttons
    var table = $('#bannerTable').DataTable();
    $(document).on('click', '.active', function () {
        // console.log('clicked');
        var button = $(this);
        var data = table.row(button.closest('tr')).data();
        var bannerId = data[0]; // Assuming the product ID is in the first column
        // console.log(bannerId);

        $.ajax({
            method: 'POST',
            url: '<?= base_url('admin/setBannerActiveStatus') ?>',
            data: {
                'id': bannerId,
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
        var bannerId = data[0]; // Assuming the product ID is in the first column
        // console.log(bannerId);
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/delete_Banner') ?>",
            data: {
                'id': bannerId
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
            url: "<?= base_url('admin/edit_BannerData') ?>",
            data: {
                'id': programId,
            },
            success: function (response) {
                // console.log(response);
                var BannerName = response.data.banner_name;
                // var VideoURL = response.data.video_url;
                // // console.log(product_id);

                // // initalise the value to input feild
                $('#Ubanner_name').val(BannerName);
                // $('#Uvideo_url').val(VideoURL);
            }
        });
    });


    // Update the data function
    $('#update_data').click(function (e) {
        e.preventDefault();
        // console.log('clicked');
        var data = {
            'id': $('#productUpdateId').val(),
            'banner_name': $('#Ubanner_name').val(),
        };
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/update_BannerData') ?>",
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