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
                                <h5 class="modal-title" id="exampleModalLabel">Live TV URL</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form id="formId">
                                        <div class="row">
                                            <div class="col">
                                                <!-- <input type="hidden" name="productUpdateId" id="productUpdateId"> -->
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Live TV URL</label><span
                                                        class="text-danger">*</span>
                                                    <input type="url" class="form-control" id="livetv" name="livetv">
                                                    <div class="invalid-feedback" class="text-danger" id="livetv_msg">
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
                            Live TV
                        </div>
                        <div class="add-banner">
                            <button class="btn btn-info" id="add" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Add Live TV URL</button>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Table -->
                <table class="table-bordered table-hover mt-4" id="liveTvTable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Live TV URL</th>
                        </tr>
                    </thead>
                    <tbody class="LivetvInfo">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= ASSET_URL . 'public/assets/js/livetv.js' ?>"></script>
<?= $this->endSection() ?>