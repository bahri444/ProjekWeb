<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
// include "ModelKegiatan.php";
// $kegiatan = new ModelKegiatan();
// $id = $_GET['id'];
// $detail = $kegiatan->find($id);
// if (isset($_POST['simpan'])) {
//     $kegiatan->edit($id, [
//         'nm_keg' => $_POST['nm_keg'],
//         'tgl_keg' => $_POST['tgl_keg'],
//         'tempat' => $_POST['tempat'],
//         'foto' => $_POST['foto'],
//         'deskripsi' => $_POST['deskripsi'],
//     ]);
//     header('location:kegiatan.php');
// }
require 'newcon.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$keg = query("SELECT * FROM kegiatan WHERE id = '$id'")[0];



// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["edit"])) {

    // cek apakah data berhasil diubah atau tidak

    if (ubah_kegiatan($_POST) != 0) {
        echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'kegiatan.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'kegiatan.php';
			</script>
		";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css">
    <title>EditKegiatan</title>
</head>

<body>
    <div class="containerpes">
        <div class="headerdua">
            <div class="teksheader">Edit Kegiatan</div>
        </div>
        <div class="containerform">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $keg['id']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $keg['foto']; ?>">

                <label></label>
                <input type="text" name="nm_keg" id="nm_keg" value="<?= $keg['nm_keg']; ?>" placeholder="nama kegiatan" style="width:97%; height:25px">
                <br>
                <label>Pilih Foto</label>
                <img src="image/<?= $keg['foto']; ?>" width="40"> <br>
                <input type="file" name="foto" id="foto" style="border: solid #fff 2px;">
                <br>
                <label></label>
                <input type="date" name="tgl_keg" id="tgl_keg" value="<?= $keg['tgl_keg']; ?>" placeholder="tanggal kegiatan" style="width:97%; height:25px">
                <br>
                <label></label>
                <input type="text" name="tempat" id="tempat" value="<?= $keg['tempat']; ?>" placeholder="tempat kegiatan" style="width:97%; height:25px">
                <br>
                <label></label>
                <textarea name="deskripsi" id="deskripsi" value="<?= $keg['deskripsi']; ?>" cols="43" rows="3" placeholder="Deskripsi"></textarea>
                <br>
                <div class="tombol">
                    <div class="tombol1">
                        <a href="kegiatan.php">Kembali</a>
                    </div>
                    <div class="tombol2">
                        <button type="submit" name="edit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>