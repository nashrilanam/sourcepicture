<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/assets/css/responsive.css">
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
          <form class="d-flex" role="search">
            <input class="form-control me-2 inisearch1" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary inisearch" type="submit">Search</button>
          </form>
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
  <div class="gallery-container">
    <?php foreach ($foto as $foto) : ?>
      <div class="gallery-item mt-4" onclick="redirectToPage('/post/<?= $foto['id_foto'] ?>')">
        <img src="/foto_storage/<?= $foto['lokasi_file'] ?>">
      </div>
    <?php endforeach; ?>
  </div>
  <script src="js/onclick.js"></script>
  <script src="https://kit.fontawesome.com/a3864c1aa4.js" crossorigin="anonymous"></script>
</body>

</html>