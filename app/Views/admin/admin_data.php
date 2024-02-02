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
                            Admin Data
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
                        </tr>
                    </thead>
                    <tbody class="adminInfo">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax: {
            url: "<?= base_url('api/admin_info') ?>",
            type: "GET",
            error: function(xhr, error, thrown) {
            console.log("AJAX error:", xhr, error, thrown);
        }
        },
        drawCallback: function (settings) {
            // console.log('Table redrawn:', settings);
        }
    });
</script>

<?= $this->endSection() ?>