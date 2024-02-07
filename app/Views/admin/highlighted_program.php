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
                <!-- Add Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Highlighted Program</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form id="formId">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Video Title</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" id="video_title"
                                                        name="video_title">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="video_title_msg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="expiryDate" class="form-label">Video URL</label>
                                                    <span class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="video_url"
                                                        id="video_url">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="video_url_msg">
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
                                <h5 class="modal-title" id="exampleModalLabel">Update Program</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form id="formId">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="productUpdateId" id="productUpdateId">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Video Title</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" id="Uvideo_title"
                                                        name="Uvideo_title">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="Uvideo_title_msg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="expiryDate" class="form-label">Video URL</label>
                                                    <span class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="Uvideo_url"
                                                        id="Uvideo_url">
                                                    <div class="invalid-feedback" class="text-danger"
                                                        id="Uvideo_url_msg">
                                                    </div>
                                                </div>
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
                            Highlighted Program
                        </div>
                        <div class="add-program">
                            <button class="btn btn-info" id="add" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Add Program</button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Table -->
                <table class="table-bordered table-hover mt-4" id="myTable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Video Title</th>
                            <th>Video URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="videoInfo">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= ASSET_URL . 'public/assets/js/highlighted_program.js'?>"></script>
<?= $this->endSection() ?>