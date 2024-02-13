<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg {
            background: linear-gradient(rgba(255, 255, 255, 1) 0%, rgba(251, 251, 251, 0.1) 100%), linear-gradient(90deg, #84d2ff, #8d5acd);
        }
    </style>

</head>

<body class="bg">

    <div class="container mt-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                        <form action="/auth/valid_register" method="post" class="user">
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" type="text" name="nama_lengkap" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Email Anda" required>
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Alamat Anda" required>
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" type="password" name="confirm" class="form-control form-control-user" id="exampleInputPassword" placeholder="Confirm Password" required>
                                    </div>

                                    <button name="register" type="submit" class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/login">Sudah memiliki akun? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>