<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/6d2fa4f343.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/post.css">
    <title>SOURCE PICTURE</title>

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
                    <a class="nav-link active "></a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</head>

<body>
    <div class="container background">
        <div class="row">
            <div class="col-foto">
                <div class="casing-foto mx-auto">
                    <img src="/foto_storage/<?= $foto['lokasi_file'] ?>" class="fotonya" alt="...">
                </div>
            </div>
            <div class="col-info">
                <div class="row">
                    <div class="container">
                        <h1><?= $foto['judul_foto'] ?></h1>
                        <p><?= $foto['deskripsi_foto'] ?></p>

                        <?php if ($terlike) : ?>
                            <a href="/unlike/<?= $foto['id_foto'] ?>" class="btn btn-secondary"><i class="fa-solid fa-heart fa-xl" style="color: #ff0000;"></i> <?= $totallike ?></a>
                        <?php else : ?>
                            <a href="/like/<?= $foto['id_foto'] ?>" class="btn btn-secondary" style="opacity: 0.7;"><i class="fa-regular fa-heart fa-xl"></i> <?= $totallike ?></a>
                        <?php endif; ?>
                        <a onclick="album('/tambahalbum/<?= $foto['id_foto'] ?>/')" class="btn btn-primary"><i class="fa-solid fa-bookmark fa-xl" style="color: black;"></i></a>

                        <row class="hidden-form-komentar">
                            <div class="hidden-four">
                                <div class="form_komentar2">
                                    <form action="/komentar/save/<?= $foto['id_foto']; ?>" method="post">
                                        <label for="exampleInputEmail1" class="form-label">Komentar</label>
                                        <input autocomplete="off" type="text" name="isi_komentar" id="komentar" class="form-control" placeholder="Tulis Komentar Anda" style="font-size: 15px">
                                        <button class="mt-3 btn btn-primary" type="submit">Kirim</button>
                                    </form>
                                    <?php foreach ($komentar as $k) : ?>
                                    <p>@<?= $k['username'] ?> : <?= $k['isi_komentar'] ?></p>
                                  <?php endforeach;?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function album(albumUrl) {
      Swal.fire({
        text: "Pilih album untuk menyimpan foto ini",
        input: "select",
        inputOptions: {
          <?php foreach ($album as $a) : ?> "<?php echo $a['id_album']; ?>": "<?php echo $a['nama_album']; ?>",
          <?php endforeach; ?>},
        inputPlaceholder: "Pilih",
        showCancelButton: true,
        confirmButtonText: "Pilih",
        cancelButtonText: "Batalkan",
        showDenyButton: true,
        denyButtonColor: "#3085d6",
        denyButtonText: "Buat Album Baru",
        inputValidator: (value) => {
          return new Promise((resolve) => {
            if (value === "") {
              resolve("tolong pilih album");
            } else {
              const albumUrls = albumUrl + value;
              window.location.href = albumUrls;
            }
          })  
        }, 
      })
      .then((result) => {
            if (result.isDenied) {
            buatalbum('/submitalbum/');
            }
          });
    }

    function buatalbum(buatalbumUrl) {
    Swal.fire({
      input: "text",
      inputLabel: "Buat Album Baru",
      inputPlaceholder: "Nama Album...",
      showCancelButton: true,
      confirmButtonText: "Buat",
      cancelButtonText: "Batalkan",
      inputAttributes: {
        autocomplete: "off"
      },
      inputValidator: (value) => {
        return new Promise((resolve) => {
          if (value == "") {
            resolve("nama album tidak boleh kosong");
          } else {
            const album = buatalbumUrl + value;
            window.location.href = album;
          }
        })
      },
    });
}
</script>
</html>