<?= $this->extend('inc/snippet.php'); ?>
<?= $this->section('content'); ?>

<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
        style="background:url(<?= ASSET_URL . 'public/assets/images/background/login-register.jpg' ?>) no-repeat center center; background-size: cover;">
        <div class="auth-box p-4 bg-white rounded mt-4 mb-4" style="width:30%">
            <div>
                <div class="logo">
                    <h3 class="box-title mb-3">Sign Up</h3>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3 form-material" id="formId">
                            <div class="form-group mb-3">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                                    <div class="invalid-feedback" class="text-danger" id="name_msg"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" id="email" name="email" placeholder="Email">
                                    <div class="invalid-feedback" class="text-danger" id="email_msg"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3 ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" name="password" id="password"
                                        placeholder="Password">
                                    <div class="invalid-feedback" class="text-danger" id="password_msg"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" name="confirmPassword"
                                        id="confirmPassword" placeholder="Confirm Password">
                                    <div class="invalid-feedback" class="text-danger" id="confirmPassword_msg"></div>
                                </div>
                            </div>
                            <div class="form-group text-center mb-3">
                                <div class="col-xs-12">
                                    <button
                                        class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                        type="submit" name="submit" id="submit">Sign Up</button>
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-2 ">
                                <div class="col-sm-12 text-center ">
                                    Already have an account? <a href="<?= base_url('admin/login') ?>"
                                        class="text-info ml-1 ">Sign In</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#submit').click(function (event) {
            event.preventDefault(); // Prevents the default form submission behavior
            // console.log('clicked');
            let formData = $('#formId').serialize();
            // console.log(formData);
            $.ajax({
                method: "POST",
                url: "<?= base_url('admin/register') ?>",
                data: formData,
                dataType: "json",
                success: function (response) {
                    $('input').removeClass('is-invalid');
                    if (response.status == 'success') {
                        $('input').val('');
                        // console.log('User Registered');
                        window.location.href = "<?= base_url('admin/login') ?>";
                    } else {
                        let error = response.errors;
                        // console.log(error);
                        for (const key in error) {
                            // console.log(key, error[key]);
                            document.getElementById(key).classList.add('is-invalid');
                            document.getElementById(key + '_msg').innerHTML = error[key];
                        }
                    }
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>