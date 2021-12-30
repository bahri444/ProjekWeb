<?php
$koneksi = mysqli_connect("localhost", "root", "bahrysemet", "ukm");


if (isset($_POST['login'])) {
	$username = $koneksi->real_escape_string($_POST['username']);
	$password = $koneksi->real_escape_string($_POST['password']);

	//cek user login 
	$cek_login = $koneksi->query("SELECT * FROM user WHERE username='$username'");
	$ktm_login = $cek_login->num_rows;
	$data_login = $cek_login->fetch_assoc();

	if ($ktm_login >= 1) {
		//login user tersedia
		//verify password 
		if (password_verify($password, $data_login['password'])) {
			//silakan buat session dan redirect disini
			session_start();
			$_SESSION['id'] = $data_login['id'];
			//redircet 
			header("location:dashboard.php");
		} else {
			echo "Login gagal, Silakan coba lagi!";
		}
	} else {
		//login gagal, email tidak tersedia
		echo "Login gagal, username";
	}

	//$user->close();
}

//fungsi untuk tabel modul
function tambah()
{
	global $koneksi;
	$nm_keg = htmlspecialchars($_POST['nm_keg']);
	$tgl_keg =  htmlspecialchars($_POST['tgl_keg']);
	$tempat =  htmlspecialchars($_POST['tempat']);
	$foto = upload();
	if (!$foto) {
		return false;
	}
	$deskripsi = $_POST['deskripsi'];
	$query = "INSERT INTO kegiatan (`nm_keg`,`tgl_keg`,`tempat`,`foto`,`deskripsi`) VALUES('$nm_keg','$tgl_keg','$tempat','$foto','$deskripsi')";
	// var_dump($query);
	// die;
	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);
}


function upload()
{
	$namaFile = $_FILES["foto"]["name"];
	//$ukuranFile = $_FILES["foto"]["size"];
	$error = $_FILES["foto"]["error"];
	$tmp_name = $_FILES["foto"]["tmp_name"];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = [`jpg`, `svg`, `png`];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar2 = strtolower(end($ekstensiGambar));
	if (in_array($ekstensiGambar2, $ekstensiGambarValid)) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	// if ($ukuranFile > 1000000) {
	// 	echo "<script>
	// 			alert('ukuran gambar terlalu besar!');
	// 		  </script>";
	// 	return false;
	// }

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar2;

	move_uploaded_file($tmp_name, 'image/' . $namaFileBaru);

	return $namaFileBaru;
}
//move_uploaded_file($tmp_name,'image/'.foto)
function query($query)
{
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

//fungsi update data modul
// function updatemodul($data)
// {
// 	global $koneksi;

// 	$id = $data["id"];
// 	$nim = htmlspecialchars($data["nim"]);
// 	$nm_mod = htmlspecialchars($data["nm_mod"]);
// 	$modul = htmlspecialchars($data["modul"]);
// 	$tgl_up = htmlspecialchars($data["tgl_up"]);
// 	$modulLama = htmlspecialchars($data["gambarLama"]);

// 	// cek apakah user pilih gambar baru atau tidak
// 	if (
// 		$_FILES['modul']['error'] === 4
// 	) {
// 		$modul = $modulLama;
// 	} else {
// 		$modul = upload();
// 	}


// 	$query = "UPDATE mahasiswa SET
// 				nim = '$nim',
// 				nm_mod = '$nm_mod',
// 				modul = '$modul',
// 				tgl_up = '$tgl_up',
// 			  WHERE id = '$id'
// 			";

// 	mysqli_query($koneksi, $query);

// 	return mysqli_affected_rows($koneksi);
// }

//fungsi update data kegiatan
function ubah_kegiatan()
{
	global $koneksi;

	$id = $_POST["id"];
	$nm_keg = htmlspecialchars($_POST["nm_keg"]);
	$tgl_keg = htmlspecialchars($_POST["tgl_keg"]);
	$tempat = htmlspecialchars($_POST["tempat"]);
	$fotoLama = htmlspecialchars($_POST["fotoLama"]);
	$deskripsi = htmlspecialchars($_POST["deskripsi"]);

	// cek apakah user pilih gambar baru atau tidak
	if (
		$_FILES['foto']['error'] === 4
	) {
		$foto = $fotoLama;
	} else {
		$foto = upload();
	}


	$query = "UPDATE kegiatan SET
				`nm_keg` = ' $nm_keg',
				`tgl_keg` = '$tgl_keg',
				`tempat` = '$tempat',
				`foto` = '$foto',
				`deskripsi` = '$deskripsi',
			  WHERE `id` = '$id'
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

//query cari data
// function cari($keyword)
// {
// 	$query = "SELECT * FROM kegiatan
// 				WHERE
// 			  id LIKE '%$keyword%' OR
// 			  nm_keg LIKE '%$keyword%' OR
// 			  tgl_keg LIKE '%$keyword%' OR
// 			  tempat LIKE '%$keyword%' 
// 			";
// 	return query($query);
// }
