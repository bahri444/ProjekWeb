<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    //header('location:login.php');
}
include "ModelMember.php";
$member = new ModelMember();
$data_member = $member->all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Data Member</title>
</head>

<body style="background-color:#fff; margin:auto; padding:0; width: 109%;">
    <nav class="navbar navbar-light" style="background-color: #0081cb; margin-bottom: 30px;">
        <div style=" text-align: center; font-size:25px; color:#fff; font-weight:bold;">
            Histori Kegiatan
        </div>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="cari data member" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </nav>
    <div style="margin-bottom: 5px; margin-left:20px">
        <a href="tambah_member.php" style="color: #212121; font-weight: bold;">Tambah Member</a>
    </div>
    <table class="table table-bordered" style="width:100%;">
        <thead style="background-color: #00b0ff">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nim</th>
                <th scope="col">Nama</th>
                <th scope="col">Foto</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamt</th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Akun Github</th>
                <th scope="col">Prodi</th>
                <th scope="col">Kelas</th>
                <th scope="col">Angkatan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data_member as $list) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $list->nim ?></td>
                    <td><?= $list->nama ?></td>
                    <td><?= $list->foto ?></td>
                    <td><?= $list->jen_kel ?></td>
                    <td><?= $list->alamat ?></td>
                    <td><?= $list->telepon ?></td>
                    <td><?= $list->email ?></td>
                    <td><?= $list->akun_git ?></td>
                    <td><?= $list->prodi ?></td>
                    <td><?= $list->kelas ?></td>
                    <td><?= $list->angkatan ?></td>
                    <td>
                        <a href="edit_member.php?id=<?= $list->id ?>">Edit</a>
                        <a href="hapus_member.php?id=<?= $list->id ?>">Hapus</a>
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