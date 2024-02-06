<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark" style="background: #212529;">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a href="<?= base_url('admin/basavatv') ?>" style="margin-left: 15px;">
                <img src="<?= ASSET_URL . 'public/assets/images/gallery/LOGO.png' ?>" alt="user" width="150" height="80"
                    class="profile-pic rounded-circle" />
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
                <!-- <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark"
                        href="javascript:void(0)"><i class="bi bi-list"></i></a> </li> -->
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
                                            src="<?= ASSET_URL . 'public/assets/images/users/user.jpg' ?>" alt="user"
                                            class="rounded" width="80"></div>
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
<aside class="left-sidebar" style="background: #212529;">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="<?= base_url('admin/precious_program') ?>" aria-expanded="false"><i
                            class="mdi mdi-calendar"></i><span class="hide-menu">Precious Program</span></a></li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="<?= base_url('admin/highlighted_program') ?>" aria-expanded="false"><i
                            class="mdi mdi-comment-processing-outline"></i>
                        <span class="hide-menu">Highlighted Program</span>
                    </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/product')?>"
                        aria-expanded="false"><i class="mdi mdi-account-box"></i><span
                            class="hide-menu">Products</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url('admin/admin_data') ?>"
                        aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Admin Data</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url('admin/banners')?>"
                        aria-expanded="false"><i class="mdi mdi-arrange-bring-forward"></i><span
                            class="hide-menu">Banners</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/enquiry_data') ?>"
                        aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Enquiry
                            Products</span></a></li>
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