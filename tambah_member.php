<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    //header('location:login.php');
}
include "ModelMember.php";
$member = new ModelMember();
if (isset($_POST['simpan'])) {
    $data = [
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama'],
        'foto' => $_POST['foto'],
        'jen_kel' => $_POST['jen_kel'],
        'alamat' => $_POST['alamat'],
        'telepon' => $_POST['telepon'],
        'email' => $_POST['email'],
        'akun_git' => $_POST['akun_git'],
        'prodi' => $_POST['prodi'],
        'kelas' => $_POST['kelas'],
        'angkatan' => $_POST['angkatan'],
    ];
    $member->save($data);
    header('location:member.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <title>TambahMember</title>
</head>
<body>
    <div class="containerpes">
        <div class="headerdua">
            <div class="teksheader">Tambah Member</div>
        </div>
        <form method="post">
            <label></label>
            <input type="text" name="nim" id="nim" required placeholder="nim" style="width:97%; height:25px">
            <br>
            <label></label>
            <input type="text" name="nama" id="nama" required placeholder="nama" style="width:97%; height:25px">
            <br>
            <label>Pilih Foto</label>
            <input type="file" name="foto" id="foto" enctype="multipart/form-data" accept="" required  placeholder="foto 3 x 4" style="border: solid #fff 2px;">
            <br>
            <p>Pilih Jenis Kelamin</p>
            <input type="radio" name="jen_kel" id="jen_kel" value="laki-laki" required>
            <label>Laki-laki</label>
            <input type="radio" name="jen_kel" id="jen_kel" value="perempuan" required>
            <label>Perempuan</label>
            <br>
            <label></label>
            <input type="text" name="alamat" id="alamat" required  placeholder="alamat" style="width:97%; height:25px">
            <br>
            <label></label>
            <input type="text" name="telepon" id="telepon" required placeholder="telepon" style="width:97%; height:25px">
            <br>
            <label></label>
            <input type="text" name="email" id="email" required placeholder="email" style="width:97%; height:25px">
            <br>
            <label></label>
            <input type="text" name="akun_git" id="akun_git" required placeholder="akun github" style="width:97%; height:25px">
            <br>
            <label></label>
            <input type="text" name="prodi" id="prodi" required placeholder="prodi" style="width:97%; height:25px">
            <br>
            <label></label>
            <input type="text" name="kelas" id="kelas" required placeholder="kelas" style="width:97%; height:25px">
            <br>
            <label></label>
            <input type="text" name="angkatan" id="angkatan" required placeholder="angkatan" style="width:97%; height:25px">
            <br>
            <div class="tombol">
                <div class="tombol1">
                    <a href="member.php">Kembali</a>
                </div>
                <div class="tombol2">
                    <button type="submit" name="simpan">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>