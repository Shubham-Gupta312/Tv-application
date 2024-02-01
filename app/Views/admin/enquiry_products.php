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
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-row">
                        <div class="title">
                            Enquiry Product Data
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Table -->
                <table class="table-bordered table-hover mt-4" id="myTable">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                        </tr>
                    </thead>
                    <tbody class="videoInfo">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>