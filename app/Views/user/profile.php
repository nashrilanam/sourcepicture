<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Profile</title>

    <style>
        .bg {
            background: linear-gradient(rgba(255, 255, 255, 1) 0%, rgba(251, 251, 251, 0.1) 100%), linear-gradient(90deg, #84d2ff, #8d5acd);
        }
    </style>
</head>

<body class="bg">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <div class="container text-center mt-5">
                <img src="<?= 'foto_storage/' . $user['foto'] ?>" alt="" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                <div class="mt-3">
                    <h3><?= $user['nama_lengkap'] ?></h3>
                    <h3><?= $user['username'] ?></h3>
                    <h3><?= $user['email'] ?></h3>
                    <button class="btn btn-primary" onclick="redirectToPage('/editprofile')">Edit Profile</button>
                    <a href="<?= base_url('/') ?>"><button class="btn btn-secondary">Log Out</></button></a>

                    <hr>
                    <div class="container background">
                        <div class="row">
                            <div class="col-foto">
                                <div class="casing-foto mx-auto">
                                </div>
                            </div>
                            <div class="col-info">
                                <div class="row">
                                    <div class="container">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="js/onclick.js"></script>

                </div>
            </div>
        </div>
    </div>
</body>

</html>