<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    //header('location:login.php');
}
include "ModelModul.php";
$moduls = new ModelModul();
$data_moduls = $moduls->all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Modul</title>
</head>

<body>
    <nav class="navbar navbar-light" style="background-color: #0081cb; margin-bottom: 30px;">
        <div style=" text-align: center; font-size:22px; color:#fff; font-weight:bold; ">
            Modul Pemrograman
        </div>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="cari modul" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </nav>
    <div style="margin-bottom: 5px; margin-left:20px">
        <a href="tambah_modul.php" style="color: #212121; font-weight: bold;">Tambah Modul</a>
    </div>
    <table class="table table-bordered">
        <thead style="background-color: #00b0ff">
            <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Nama Modul</th>
                <th>File Modul</th>
                <th>Tanggal Upload</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data_moduls as $list) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $list->nim ?></td>
                    <td><?= $list->nm_mod ?></td>
                    <td><?= $list->modul ?></td>
                    <td><?= $list->tgl_up ?></td>
                    <td>
                        <a href="edit_modul.php?id=<?= $list->id ?>">Edit | </a>
                        <a href="">Download | </a>
                        <a href="hapus_modul.php?id=<?= $list->id ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div style="margin-left:20px">
        <a href="dashboard.php" style="color: #212121">Kembali</a>
    </div>
</body>

</html>