<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>SOURCE PICTURE</title>
</head>

<body>
    <div class="container text-center mt-5">
        <img src="/img/profile.jpg" alt="" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
        <div class="mt-3">
        <h3><?= session()->get('nama_lengkap'); ?></h3>
            <h3><?= session()->get('username'); ?></h3>
            <h3><?= session()->get('email'); ?></h3>
            <h3><?= session()->get('alamat');?></h3>
            <button class="btn btn-primary" onclick="redirectToPage('/editprofile')">Edit Profile</button>
            <a href="<?=base_url('/')?>"><button class="btn btn-secondary">Log Out</></button></a>

            <hr>

            <script src="js/onclick.js"></script>

        </div>
    </div>
</body>

</html>