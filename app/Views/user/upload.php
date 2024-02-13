<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="/img/logo5.png" alt="" style="object-fit: cover;" width="70" height="45" class="d-inline-block align-text-top">
            </a>
            <div class="brand">SOURCE PICTURE</div>
            <ul class="navbar-nav ms-3 me-3 mb-lg-0 inihome">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto mb-lg-0 inicreate">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="/upload">Upload</a>
                </li>
            </ul>
            <ul class="navbar-nav me-3 ms-2 mb-lg-0 inicrt">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="/upload"><i class="fa-solid fa-plus fa-lg" style="color: #000000;"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav me-5 ms-5 mx-auto mb-lg-0">
                <li class="nav-item">
                </li>
            </ul>
            <ul class="navbar-nav ms-3 mb-lg-0">
                <li class="nav-item me-5">
                    <div class="dropdown ">
                        <a class="nav-link active dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-current="page" href="#">
                            <img src="/img/profile.jpg" alt="user" width="45" height="45" class="d-inline-block align-text-top rounded-circle">
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="/">Log Out</a></li>
                            <li>

                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</head>

<body>

    <style>
        .bg {
            background: linear-gradient(rgba(255, 255, 255, 1) 0%, rgba(251, 251, 251, 0.1) 100%), linear-gradient(90deg, #84d2ff, #8d5acd);
        }
    </style>

    <body class="bg">
        <section id="pengaduan" class="d-flex align-items-center">
            <div class="container mt-4">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/upload/save" enctype="multipart/form-data">
                            <h3>Tambahkan Foto</h3>
                            <br>
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Judul</label>
                                <input autocomplete="off" type="text" name="judul" id="judul_foto" class="form-control" placeholder="Ketik Judul Foto Anda" style="font-size: 15px">
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                <textarea autocomplete="off" type="text" name="desk" id="deskripsi_foto" class="form-control" placeholder="Ketik Deskripsi Foto Anda" style="font-size: 15px"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                            </div>
                            <div class="d-flex justify-content-end form-check">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </body>
</body>

</html>