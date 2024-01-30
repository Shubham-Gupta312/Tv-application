<?= $this->extend('admin/snippet.php'); ?>
<?= $this->section('content'); ?>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <h1>Basava Tv</h1>
                </a>

                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto float-left">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="<?= ASSET_URL . 'public/assets/images/users/user.jpg' ?>" alt="user" width="30"
                                class="profile-pic rounded-circle" />
                        </a>
                        <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                            <ul class="dropdown-user list-style-none">
                                <li>
                                    <div class="dw-user-box p-3 d-flex">
                                        <div class="u-img"><img
                                                src="<?= ASSET_URL . 'public/assets/images/users/user.jpg' ?>"
                                                alt="user" class="rounded" width="80"></div>
                                        <div class="u-text ml-2">
                                            <?php if (session()->loggedin == 'loggedin'): ?>
                                                <h4 class="mb-0">
                                                    <?= ucfirst(session()->name) ?>
                                                </h4>
                                                <p class="text-muted mb-1 font-14">
                                                    <?= session()->email ?>
                                                </p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="dropdown-divider"></li>
                                <li class="user-list"><a class="px-3 py-2" href="<?= base_url('admin/logout') ?>"><i
                                            class="fa fa-power-off"></i>
                                        Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="app-calendar.html" aria-expanded="false"><i class="mdi mdi-calendar"></i><span
                                class="hide-menu">Precious Program</span></a></li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-chats.html"
                            aria-expanded="false"><i class="mdi mdi-comment-processing-outline"></i>
                            <span class="hide-menu">Highlighted Program</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="app-contacts.html" aria-expanded="false"><i class="mdi mdi-account-box"></i><span
                                class="hide-menu">Products</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="app-invoice.html" aria-expanded="false"><i class="mdi mdi-book"></i><span
                                class="hide-menu">Admin Data</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="app-notes.html" aria-expanded="false"><i
                                class="mdi mdi-arrange-bring-forward"></i><span class="hide-menu">Banners</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="app-todo.html" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span
                                class="hide-menu">Enquiry Products</span></a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div
                                    class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                                    <i class="ti-wallet"></i>
                                </div>
                                <div class="ml-2 align-self-center">
                                    <h3 class="mb-0 font-weight-light">01</h3>
                                    <h5 class="text-muted mb-0">Precious Program</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div
                                    class="round round-lg text-white d-inline-block text-center rounded-circle bg-warning">
                                    <i class="mdi mdi-cellphone-link"></i>
                                </div>
                                <div class="ml-2 align-self-center">
                                    <h3 class="mb-0 font-weight-light">8</h3>
                                    <h5 class="text-muted mb-0">Highlighted Program</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div
                                    class="round round-lg text-white d-inline-block text-center rounded-circle bg-primary">
                                    <i class="mdi mdi-cart-outline"></i>
                                </div>
                                <div class="ml-2 align-self-center">
                                    <h3 class="mb-0 font-weight-light">25</h3>
                                    <h5 class="text-muted mb-0">Products</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div
                                    class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                    <i class="mdi mdi-bullseye"></i>
                                </div>
                                <div class="ml-2 align-self-center">
                                    <h3 class="mb-0 font-weight-light">03</h3>
                                    <h5 class="text-muted mb-0">Admin Data</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div
                                    class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                    <i class="mdi mdi-bullseye"></i>
                                </div>
                                <div class="ml-2 align-self-center">
                                    <h3 class="mb-0 font-weight-light">04</h3>
                                    <h5 class="text-muted mb-0">Banners</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div
                                    class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                    <i class="mdi mdi-bullseye"></i>
                                </div>
                                <div class="ml-2 align-self-center">
                                    <h3 class="mb-0 font-weight-light">10</h3>
                                    <h5 class="text-muted mb-0">Enquiry Products</h5>
                                </div>
                            </div>
                        </div>
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

<?= $this->endSection() ?>