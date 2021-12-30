<?php
include "newcon.php";
if (isset($_POST['simpan'])) {	
	// cek apakah data berhasil di tambahkan atau tidak
    $nm_keg = $_POST['nm_keg'];
    $tgl_keg = $_POST['tgl_keg'];
    $tempat = $_POST['tempat'];
    $temp = $_FILES['foto']['tmp_name'];
    $name = rand(0,9999).$_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];
    $type = $_FILES['foto']['type'];
    $deskripsi = $_POST['deskripsi'];
    $folder = "image/";
    if ($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png')) {
        move_uploaded_file($temp, $folder . $name);
        mysqli_query($koneksi, "INSERT INTO kegiatan (`nm_keg`,`tgl_keg`,`tempat`,`foto`,`deskripsi`) VALUES (`$nm_keg`,`$tgl_keg`,`$tempat`,`$name`,`$deskripsi`)");
        header('location:kegiatan.php');
    }else{
        echo "<b>Gagal Upload File</b>";
    }
}
?>