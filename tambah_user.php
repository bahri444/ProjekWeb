<?php
session_start();
if (!isset($_SESSION['id'])) {
    //header('location:login.php');
}
include "ModelUser.php";
$user = new ModelUser();
if (isset($_POST['simpan'])) {
    $data = [
        'username' => $_POST['username'],
        'password' =>password_hash($_POST['password'], PASSWORD_DEFAULT),
    ];
    $user->save($data);
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleform.css">
    <title>buat akun</title>
</head>
<body>
    <div class="contuser">
        <div class="header">
            <div class="teks2">Buat Akun</div>
        </div>
        <form method="post">
            <label for=""></label>
            <input type="text" name="username" placeholder="username">
            <br>
            <label for=""></label>
            <input type="password" name="password" placeholder="password">
            <br>
            <!--<label for=""></label>
            <select name="rolle" id="rolle">
                <option value="">Pilih User</option>
                <option value="admin">Admin</option>
                <option value="member">Member</option>
            </select>-->
            <div class="tombol">
                <div class="tombol1">
                    <a href="index.php">Kembali</a>
                </div>
                <div class="tombol2">
                    <button type="submit" name="simpan">Buat</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>