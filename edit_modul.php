<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:login.php');
}
require 'newcon.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$moduls = query("SELECT * FROM moduls WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["update"])) {

    // cek apakah data berhasil diubah atau tidak
    if (updatemodul($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'moduls.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'moduls.php';
			</script>
		";
    }
}
?>
// include "ModelModul.php";
// $moduls = new ModelModul();
// $id = $_GET['id'];
// $detail = $moduls->find($id);
// if (isset($_POST['simpan'])) {
// $moduls->edit($id, [
// 'nim' => $_POST['nim'],
// 'nm_mod' => $_POST['nm_mod'],
// 'modul' => $_POST['modul'],
// 'tgl_up' => $_POST['tgl_up'],
// ]);
// header('location:moduls.php');
// }
// ?>
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
        <form method="post" enctype="multipart/form-data">
            <label for=""></label>
            <input type="text" name="nim" value="<?= $moduls['nim']; ?>" placeholder="nim">
            <br>
            <label for=""></label>
            <input type="text" name="nm_mod" value="<?= $moduls['nm_mod']; ?>" placeholder="kategory modul">

            <label for=""></label>
            <img src="img/<?= $mhs['modul']; ?>" width="40"> <br>
            <input type="file" name="modul" value="<?= $moduls['modul']; ?>" placeholder="file pdf atau docx" style="border: solid #fff 2px">

            <label for=""></label>
            <input type="date" name="tgl_up" value="<?= $moduls['tgl_up']; ?>" placeholder="tgl upload">
            <div class="tombol">
                <div class="tombol1">
                    <a href="moduls.php">Kembali</a>
                </div>
                <div class="tombol2">
                    <button type="submit" name="update">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>