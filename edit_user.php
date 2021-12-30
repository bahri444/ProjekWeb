<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    //header('location:login.php');
}
include "ModelUser.php";
$user = new ModelUser();
$id = $_GET['id'];
$detail = $user->find($id);
if (isset($_POST['simpan'])) {
    $user->edit($id, [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ]);
    header('location:user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleform.css">
    <title>EditUser</title>
</head>

<body>
    <div class="contuser">
        <div class="header">
            <div class="teks2">Edit User</div>
        </div>
        <form method="post">
            <label for=""></label>
            <input type="text" name="username" value="<?= $detail->username ?>" placeholder="username">
            <br>
            <label for=""></label>
            <input type="text" name="password" value="<?= $detail->password ?>" placeholder="password">
            <br>
            <label for=""></label>
            <input type="text" name="rolle" value="<?= $detail->rolle ?>" placeholder="hak akses">
            <div class="tombol">
                <div class="tombol1">
                    <a href="user.php">Kembali</a>
                </div>
                <div class="tombol2">
                    <button type="submit" name="simpan">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>