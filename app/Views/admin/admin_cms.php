<?= $this->extend('admin/snippet.php'); ?>
<?= $this->section('content'); ?>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <a href="/admin/precious_program" style="text-decoration: none;">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                                        <i class="ti-wallet"></i>
                                    </div>
                                    <div class="ml-2 align-self-center">
                                        <h3 class="mb-0 font-weight-light" id="prcsCnt"></h3>
                                        <h5 class="text-muted mb-0">Precious Program</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <a href="/admin/highlighted_program" style="text-decoration: none;">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-warning">
                                        <i class="mdi mdi-cellphone-link"></i>
                                    </div>
                                    <div class="ml-2 align-self-center">
                                        <h3 class="mb-0 font-weight-light" id="hghlhtCnt"></h3>
                                        <h5 class="text-muted mb-0">Highlighted Program</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <a href="/admin/product" style="text-decoration: none;">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-primary">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </div>
                                    <div class="ml-2 align-self-center">
                                        <h3 class="mb-0 font-weight-light" id="prdctCnt"></h3>
                                        <h5 class="text-muted mb-0">Products</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <a href="/admin/admin_data" style="text-decoration: none;">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                        <i class="mdi mdi-bullseye"></i>
                                    </div>
                                    <div class="ml-2 align-self-center">
                                        <h3 class="mb-0 font-weight-light" id="admnCnt"></h3>
                                        <h5 class="text-muted mb-0">Admin Data</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <a href="/admin/banners" style="text-decoration: none;">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                        <i class="mdi mdi-bullseye"></i>
                                    </div>
                                    <div class="ml-2 align-self-center">
                                        <h3 class="mb-0 font-weight-light" id="bnrCnt"></h3>
                                        <h5 class="text-muted mb-0">Banners</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <a href="/admin/enquiry_data" style="text-decoration: none;">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                        <i class="mdi mdi-bullseye"></i>
                                    </div>
                                    <div class="ml-2 align-self-center">
                                        <h3 class="mb-0 font-weight-light" id="enqprdCnt"></h3>
                                        <h5 class="text-muted mb-0">Enquiry Products</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <a href="/admin/livetv" style="text-decoration: none;">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div
                                        class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                        <i class="mdi mdi-bullseye"></i>
                                    </div>
                                    <div class="ml-2 align-self-center">
                                        <h3 class="mb-0 font-weight-light"></h3>
                                        <h5 class="text-muted mb-0">Live TV</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
        <footer class="footer">
            © 2020 Material Pro Admin by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<script src="<?= ASSET_URL . 'public/assets/js/admin_panel.js' ?>"></script>
<?= $this->endSection() ?>