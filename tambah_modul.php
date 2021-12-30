<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:login.php');
}
include "ModelModul.php";
$moduls = new ModelModul();
if (isset($_POST['simpan'])) {
    $data = [
        'nim' => $_POST['nim'],
        'nm_mod' => $_POST['nm_mod'],
        'modul' => $_POST['modul'],
        'tgl_up' => $_POST['tgl_up'],
    ];
    $moduls->save($data);
    header('location:moduls.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleform.css">
    <title>TambahModul</title>
</head>
<body>
    <div class="contmodul">
        <div class="header">
            <div class="teks2">Tambah Modul</div>
        </div>
        <form method="post">
            <label for=""></label>
            <input type="text" name="nim" placeholder="nim" required>
            <br>
            <label for=""></label>
            <input type="text" name="nm_mod" placeholder="kategory modul" required>

            <label for=""></label>
            <input type="file" name="modul" enctype="multipart/form-data" accept="" required placeholder="file pdf atau docx" style="border: solid #fff 2px">
            
            <label for=""></label>
            <input type="date" name="tgl_up" placeholder="tgl upload" required>
            
            <div class="tombol">
                <div class="tombol1">
                    <a href="moduls.php">Kembali</a>
                </div>
                <div class="tombol2">
                    <button type="submit" name="simpan">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>