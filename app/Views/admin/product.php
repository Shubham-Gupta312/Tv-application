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
                                                    <label for="expiryDate" class="form-label">Product Price</label><span class="text-danger">*</span>
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

<script src="<?= ASSET_URL . 'public/assets/js/product.js' ?>"></script>
<?= $this->endSection() ?>