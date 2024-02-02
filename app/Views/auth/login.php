<?= $this->extend('inc/snippet.php'); ?>
<?= $this->section('content'); ?>

<div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
    style="background:url(<?= ASSET_URL . 'public/assets/images/background/login-register.jpg' ?>) no-repeat center center; background-size: cover;">
    <div class="auth-box p-4 bg-white rounded mt-4 mb-4" style="width: 30%">
        <div id="loginform">
            <div class="logo">
                <h3 class="box-title mb-3">Sign In</h3>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal mt-3 form-material" id="formID">
                        <div class="form-group mb-3">
                            <div class="">
                                <input class="form-control" type="text" name="email" id="email" placeholder="Email">
                                <div class="invalid-feedback" class="text-danger" id="email_msg"></div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="">
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="Password">
                                <div class="invalid-feedback" class="text-danger" id="password_msg"></div>
                            </div>
                        </div>
                        <div class="form-group text-center mt-4">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="button" name="login" id="login">Log In</button>
                            </div>
                        </div>
                        <div class="warning-message">
                            <p class="wrn_msg text-danger mt-4" style="text-align:center;"></p>
                        </div>
                        <div class="form-group mb-0 mt-4">
                            <div class="col-sm-12 justify-content-center d-flex">
                                <p>Don't have an account? <a href="<?= base_url('admin/register') ?>"
                                        class="text-info font-weight-normal ml-1">Sign Up</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#login').click(function (event) {
            event.preventDefault();
            // console.log('clicked');
            let formdata = $('#formID').serialize();
            // console.log(formdata);
            $.ajax({
                method: "POST",
                url: "<?= base_url('admin/login') ?>",
                data: formdata,
                dataType: "json",
                success: function (response) {
                    $('input').removeClass('is-invalid');
                    $('.warning-message').hide();
                    if (response.status == 'success') {
                        $('input').val('');
                        // console.log('User Login');
                        window.location.href = "<?= base_url('admin/basavatv') ?>";
                    } else {
                        let error = response.errors;
                        // console.log(response.message);
                        for (const key in error) {
                            // console.log(key, error[key]);
                            document.getElementById(key).classList.add('is-invalid');
                            document.getElementById(key + '_msg').innerHTML = error[key];
                        }
                        // Display warning message
                        let wrngpass = response.message;
                        $('.wrn_msg').text(wrngpass);
                        $('.warning-message').show();
                    }
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>