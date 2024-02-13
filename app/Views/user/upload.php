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
                                <textarea autocomplete="off" type="text" name="deskripsi" id="deskripsi_foto" class="form-control" placeholder="Ketik Deskripsi Foto Anda" style="font-size: 15px"></textarea>
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