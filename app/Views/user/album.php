<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/album.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://kit.fontawesome.com/6d2fa4f343.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="js/onclick.js"></script>
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
          <a class="nav-link active " aria-current="page" href="/upload"></a>
        </li>
      </ul>
      <ul class="navbar-nav me-3 ms-2 mb-lg-0 inicrt">
        <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="/upload"><i class="fa-solid fa-plus fa-lg" style="color: #000000;"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav me-5 ms-5 mx-auto mb-lg-0">
        <li class="nav-item">
          <form class="d-flex" role="search" method="post" action="/search">
            <input class="form-control me-2 inisearch1" name="keyword" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary inisearch" type="submit">Search</button>
          </form>
        </li>
      </ul>
      <ul class="navbar-nav ms-3 mb-lg-0">
        <li class="nav-item me-5">
          <div class="dropdown ">
            <a class="nav-link active dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-current="page" href="#">
              <img src="/foto_storage/<?= session('foto') ?>" alt="user" width="45" height="45" class="d-inline-block align-text-top rounded-circle">
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/profile">Profile</a></li>
              <li><a class="dropdown-item" href="/">Log Out</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }

    .gallery-container {
      column-count: 4;
      column-gap: 15px;
      margin: 20px;
    }

    .gallery-item img {
      width: 100%;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <div class="d-flex justify-content-center mt-3">
    <button onclick="buatalbum('/submitalbum/');" class="btn btn-lg btn-primary">Tambah</button>
  </div>
  <br>
  <div class="containerku d-flex align-items-center gap-3">
    <?php foreach ($album as $a) : ?>
      <div class="cardalbum" onclick="redirectToPage('/bukaalbum/<?= $a['id_album']; ?>')">
        <div class="titlezone">
          <span class="title"><?= $a['nama_album']; ?></span>
        </div>
      </div>
      <span class="iconsetting" onclick="bukaAlbumSetting('<?= $a['id_album'] ?>','<?= $a['nama_album']; ?>')"><i class="bi bi-gear-fill"></i></span>
    <?php endforeach; ?>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function bukaAlbumSetting($id, album) {
    event.stopPropagation();
    albumSetting($id, album);
  }


  function albumSetting($id, album) {
    Swal.fire({
      title: "Setting Album",
      showDenyButton: true,
      confirmButtonText: "Edit",
      denyButtonText: "Hapus",
      denyButtonColor: "red",

    }).then((result) => {
      if (result.isConfirmed) {
        editalbum($id, album);
      } else if (result.isDenied) {
        hapusalbum($id, album);
      }
    });
  }

  function redirectToPage(pageUrl) {
    window.location.href = pageUrl;
  }

  function buatalbum(buatalbumUrl) {
    Swal.fire({
      input: "text",
      inputLabel: "Buat Album Baru",
      inputPlaceholder: "Nama Album...",
      showCancelButton: true,
      confirmButtonText: "Buat",
      cancelButtonText: "Cancel",
      inputAttributes: {
        autocomplete: "off"
      },
      inputValidator: (value) => {
        if (value == "") {
          resolve("nama album tidak boleh kosong");
        } else {
          const album = buatalbumUrl + value;
          window.location.href = album;
        }
      },
    });
  }



  function hapusalbum($id, album) {
    Swal.fire({
      title: "Are you sure",
      text: "You want to delete this album?",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.value) {
        const deleteUrl = '/hapusalbum/' + $id;
        window.location.href = deleteUrl;
      }
    });
  }

  function editalbum($id, album) {
    Swal.fire({
      input: "text",
      inputLabel: "Edit Album",
      inputValue: album,
      inputPlaceholder: "Enter album name...",
      showCancelButton: true,
      confirmButtonText: "Edit",
      cancelButtonText: "Batalkan",
      inputAttributes: {
        autocomplete: "off"
      },
      preConfirm: (value) => {
        return new Promise((resolve) => {
          if (value.trim() === "") {
            resolve("You need to enter an album name");
          } else {
            const editUrl = '/editalbum/' + $id;
            window.location.href = editUrl + '/' + value;
          }
        });
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        // Handle confirmation
      }
    });
  }
</script>

</html>