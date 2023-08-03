<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP | SMKS TI YPML</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- logo title -->
    <link rel="icon" href="<?= base_url() ?>assets/dist/img/logo.jpg">
</head>

<body>
    <!-- Box login -->
    <div class="position-relative">
        <div class="row justify-content-center">
            <div class="position-absolute">
                <div class="row justify-content-center pt-5">
                    <img src="<?= base_url() ?>assets/dist/img/logo.jpg" class="brand-imge img-circle" alt="" width="100px">
                </div>
                <div class="text-center mt-2">
                    <h3><strong>Go</strong><b>Inventory</b> </h3>
                    <p>Selamat datang di aplikasi <strong>Go</strong><b>Inventory</b></p>
                </div>
                <div class="login-box">
                    <div class="login-logo">
                        <a href="#">Login</a>
                    </div>
                    <!-- card login -->
                    <div class="card card-outline card-primary pb-3">
                        <div class="card-body login-card-body border rounded-3">
                            <p class="login-box-msg pt-2">Masukan Username dan Password</p>
                            <?= $this->session->set_flashdata('info'); ?>
                            <form class="pt-2" action="<?= base_url() ?>auth/login" method="post">
                                <div class="input-group mb-3">
                                    <input class="form-control" type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>" placeholder="Your username or email" value="<?= set_value('username') ?>" required />
                                    <div class="invalid-feedback">
                                        <?= form_error('username') ?>
                                    </div>
                                    <div class="input-group-text">
                                        <span class="fa fa-user"></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>" placeholder="Enter your password" value="<?= set_value('password') ?>" required />
                                    <div class="invalid-feedback">
                                        <?= form_error('password') ?>
                                    </div>
                                    <div class="input-group-text">
                                        <span class="fa fa-lock"></span>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign"></i> Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Background -->
    <img src="<?= base_url() ?>assets/dist/img/background.jpg" class="img-fluid" alt="background">
    <!-- Background -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>