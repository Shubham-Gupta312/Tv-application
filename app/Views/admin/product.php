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
                <!-- Modal -->
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
            table.rows().every(function (index, element) {
                // Get data for the row (including hidden columns)
                var rowData = this.data();
                // console.log(rowData[3]);
                var rowNode = this.node();
                // Apply CSS style to the fourth column
                var fourthColumn = $(rowNode).find('td:eq(5)');
                fourthColumn.css('display', 'flex').children().css('margin-right', '10px'); 
            });
        }
    });
    // open modal, save and fetch data
    $(document).ready(function () {
        $('#save').click(function (e) {
            e.preventDefault();
            console.log('clicked');
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
</script>
<?= $this->endSection() ?>