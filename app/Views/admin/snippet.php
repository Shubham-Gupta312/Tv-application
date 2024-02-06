<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ASSET_URL . 'public/assets/images/gallery/LOGO.png' ?>">
    <title>Basava Tv</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="<?= ASSET_URL . 'public/assets/libs/chartist/dist/chartist.min.css' ?>" rel="stylesheet">
    <link href="<?= ASSET_URL . 'public/dist/js/pages/chartist/chartist-init.css' ?>" rel="stylesheet">
    <link href="<?= ASSET_URL . 'public/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css' ?>"
        rel="stylesheet">
    <link href="<?= ASSET_URL . 'public/assets/libs/c3/c3.min.css' ?>" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="<?= ASSET_URL . 'public/assets/libs/jvectormap/jquery-jvectormap.css' ?>" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= ASSET_URL . 'public/dist/css/style.min.css' ?>" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Data Table -->
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</head>
<style>
    li a { text-decoration: none;}
</style>

<body>
    <?= $this->include('admin/common') ?>
    <?= $this->renderSection('content') ?>

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="<?= ASSET_URL . 'public/assets/libs/jquery/dist/jquery.min.js' ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= ASSET_URL . 'public/assets/libs/popper.js/dist/umd/popper.min.js' ?>"></script>
    <script src="<?= ASSET_URL . 'public/assets/libs/bootstrap/dist/js/bootstrap.min.js' ?>"></script>
    <!-- apps -->
    <script src="<?= ASSET_URL . 'public/dist/js/app.min.js' ?>"></script>
    <script src="<?= ASSET_URL . 'public/dist/js/app.init.dark.js' ?>"></script>
    <script src="<?= ASSET_URL . 'public/dist/js/app-style-switcher.js' ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script
        src="<?= ASSET_URL . 'public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js' ?>"></script>
    <script src="<?= ASSET_URL . 'public/assets/extra-libs/sparkline/sparkline.js' ?>"></script>
    <!--Wave Effects -->
    <script src="<?= ASSET_URL . 'public/dist/js/waves.js' ?>"></script>
    <!--Menu sidebar -->
    <script src="<?= ASSET_URL . 'public/dist/js/sidebarmenu.js' ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= ASSET_URL . 'public/dist/js/custom.min.js' ?>"></script>
    <!--This page JavaScript -->
    <!-- chartist chart -->
    <script src="<?= ASSET_URL . 'public/assets/libs/chartist/dist/chartist.min.js' ?>"></script>
    <script
        src="<?= ASSET_URL . 'public/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js' ?>"></script>
    <!--c3 JavaScript -->
    <script src="<?= ASSET_URL . 'public/assets/libs/d3/dist/d3.min.js' ?>"></script>
    <script src="<?= ASSET_URL . 'public/assets/libs/c3/c3.min.js' ?>"></script>
    <!-- Vector map JavaScript -->
    <script src="<?= ASSET_URL . 'public/assets/libs/jvectormap/jquery-jvectormap.min.js' ?>"></script>
    <script src="<?= ASSET_URL . 'public/assets/extra-libs/jvector/jquery-jvectormap-us-aea-en.js' ?>"></script>
    <!-- Chart JS -->
    <script src="<?= ASSET_URL . 'public/dist/js/pages/dashboards/dashboard2.js' ?>"></script>
</body>

</html>