<?php
include "newcon.php";
$data_foto = mysqli_query($koneksi, "SELECT nm_keg,foto FROM kegiatan ORDER BY nm_keg,foto");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body style="background-color:#fff; margin:0; padding:0;">
    <nav class="navbar navbar-light" style="background-color: #0081cb; margin-bottom: 30px;">
        <div style=" text-align: center; font-size:25px; color:#fff; font-weight:bold; ">
            Galery
        </div>
        <form class="form-inline" method="post">
            <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="cari kegiatan" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="cari">Cari</button>
        </form>
    </nav>
    <div style="margin-bottom: 5px; margin-left:20px">
        <a href="tambah_kegiatan.php" style="color: #212121; font-weight: bold;">Tambah foto</a>
    </div>
    <div class="container">
        <div class="row">
            <?php
            foreach ($data_foto as $list) : ?>
                <div class="col">
                    <p align="center" style="font-weight: bold; font-size: 18px;"><?= $list['nm_keg']; ?> <br>
                        <img src="image/<?= $list["foto"]; ?>" width="450px" style="margin: auto; height:360px;">
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div style="margin-left:20px">
        <a href="dashboard.php" style="color: #212121">Kembali</a>
    </div>
</body>

</html>