<?php
session_start();
if (!isset($_SESSION['id'])) {
    //header('location:login.php');
}
include "newcon.php";
$kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Kegiatan</title>
</head>

<body style="background-color:#fff;">
    <nav class="navbar navbar-light" style="background-color: #0081cb; margin-bottom: 30px;">
        <div style=" text-align: center; font-size:25px; color:#fff; font-weight:bold; ">
            Histori Kegiatan
        </div>
        <form class="form-inline" method="post">
            <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="cari kegiatan" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="cari">Cari</button>
        </form>
    </nav>
    <div style="margin-bottom: 5px; margin-left:20px">
        <a href="tambah_kegiatan.php" style="color: #212121; font-weight: bold;">Tambah kegiatan</a>
    </div>
    <table class="table table-bordered">
        <thead style="background-color: #00b0ff">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Tempat Kegiatan</th>
                <th scope="col">Foto</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($kegiatan as $list) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $list['nm_keg'] ?></td>
                    <td><?= $list['tgl_keg'] ?></td>
                    <td><?= $list['tempat'] ?></td>
                    <td><img src="image/<?= $list["foto"]; ?>" width="100" style="margin: auto;"></td>
                    <td><?= $list['deskripsi'] ?></td>
                    <td>
                        <a href="edit_kegiatan.php?id=<?= $list["id"] ?>">Edit</a>
                        <a href="hapus_kegiatan.php?id=<?= $list["id"] ?>">Hapus</a>
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