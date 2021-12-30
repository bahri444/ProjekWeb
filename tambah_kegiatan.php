<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
include "newcon.php";

if (isset($_POST['simpan'])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) != 0) {
        echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'kegiatan.php';
			</script>
		";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
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
    <title>Tambah Kegiatan</title>
</head>

<body>
    <div class="containerpes">
        <div class="headerdua">
            <div class="teksheader">Tambah Kegiatan</div>
        </div>
        <div class="containerform">
            <form method="post" enctype="multipart/form-data">
                <label for=""></label>
                <input type="text" name="nm_keg" id="nm_keg" placeholder="nama kegiatan" style="width:97%; height:25px">
                <br>
                <label for=""></label>
                <input type="date" name="tgl_keg" id="tgl_keg" placeholder="tanggal kegiatan" style="width:97%; height:25px">
                <br>
                <label for=""></label>
                <input type="text" name="tempat" id="tempat" placeholder="tempat kegiatan" style="width:97%; height:25px">
                <br>
                <label for="">Pilih Foto</label>
                <input type="file" name="foto" id="foto" multiple placeholder="foto atau banner" style="border: solid #fff 2px;">
                <br>
                <label for=""></label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi"></textarea>
                <br>
                <div class="tombol">
                    <div class="tombol1">
                        <a href="dashboard.php">Kembali</a>
                    </div>
                    <div class="tombol2">
                        <button type="submit" name="simpan">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>