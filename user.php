<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    //header('location:login.php');
}
include "ModelUser.php";
$user = new ModelUser();
$data_user = $user->all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Data User</title>
</head>

<body style="background-color:#fff;">
    <nav class="navbar navbar-light" style="background-color: #0081cb;">
        <div style=" text-align: center; font-size:25px; color:#fff; font-weight:bold; ">
            Data User
        </div>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="cari data user" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </nav>
    <table class="table table-bordered">
        <thead style="background-color: #00b0ff">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <!--<th scope="col">Rolle</th>-->
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data_user as $list) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $list->username ?></td>
                    <td><?= $list->password ?></td>
                    <!-- <td>?= $list->rolle ?></td> -->
                    <td>
                        <a href="edit_user.php?id=<?= $list->id ?>">Edit</a>
                        <a href="hapus_user.php?id=<?= $list->id ?>">Hapus</a>
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