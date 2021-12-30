<?php
include "newcon.php";
$datamember = mysqli_query($koneksi, "SELECT jen_kel FROM member GROUP BY jen_kel");
$datapr = mysqli_query($koneksi, "SELECT jen_kel FROM member WHERE jen_kel=('Perempuan')");
$datalk = mysqli_query($koneksi, "SELECT jen_kel FROM member WHERE jen_kel=('Laki-laki')");

//query milik grafik bahasa pemrograman
$datamodul = mysqli_query($koneksi, "SELECT nm_mod FROM moduls GROUP BY nm_mod");
$css = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod=('css')");
$go = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod='go'");
$html = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod='html'");
$java = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod=('java')");
$php = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod=('php')");

//query kegiatan
$berita = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="designindex.css">
    <script src="ChartJs/Chart.min.js"></script>
    <script src="ChartJs/Chart.js"></script>
    <title>Index</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="tentang.php" style="margin-top:5px;">
            <img src="image/Logo_ukmTechcode.png" width="50" height="50" class="d-inline-block align-top" alt="" style="margin-top:-7px;">
            UKM TechCode
        </a>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="struktur.php">Struktur</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Registrasi
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="login.php">Masuk</a>
                                <a class="dropdown-item" href="tambah_user.php">Daftar</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kontak.php">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tentang.php">Tentang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>

    <!--awal code grafik-->
    <div class="contgr">
        <div class="graf">
            <canvas id="member"></canvas>
            <script>
                var ctx = document.getElementById("member").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [<?php while ($row = mysqli_fetch_array($datamember)) {
                                        echo '"' . $row['jen_kel'] . '",';
                                    } ?>],
                        datasets: [{
                            label: [],
                            data: [<?= mysqli_num_rows($datalk) ?>,
                                <?= mysqli_num_rows($datapr)
                                ?>
                            ],
                            backgroundColor: ['#304ffe', '#17bebb'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Grafik Anggota UKM TechCode"
                        }
                    }
                });
            </script>
        </div>
        <div class="graf">
            <canvas id="moduls"></canvas>
            <script>
                var ctx = document.getElementById("moduls").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: [<?php while ($row = mysqli_fetch_array($datamodul)) {
                                        echo '"' . $row['nm_mod'] . '",';
                                    } ?>],
                        datasets: [{
                            label: [],
                            data: [
                                <?= mysqli_num_rows($css) ?>,
                                <?= mysqli_num_rows($go) ?>,
                                <?= mysqli_num_rows($html) ?>,
                                <?= mysqli_num_rows($java) ?>,
                                <?= mysqli_num_rows($php) ?>,
                            ],
                            backgroundColor: ["#304ffe", "#1e88e5", "#d50000", "#9b0000", "#7b1fa2"],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Grafik Modul Bahasa Pemrograman"
                        }
                    }
                });
            </script>
        </div>
    </div>
    <!--akhir code grafik-->

    <?php $i = 1;
    foreach ($berita as $list) : ?>
        <div class="information">
            <div class="infoGambar">
                <img src="image/<?= $list["foto"]; ?>" width="100" style="margin: auto;"></td>
            </div>
            <div class="infoTeks">
                <p align="center" style="font-weight: bold; font-size: 18px;"><?= $list['nm_keg']; ?> <br></p>
                <p style="text-align: justify;"><?= $list['deskripsi'] ?></p>
                <p style="text-align: right;"><?= $list['tempat'] ?>,<?= $list['tgl_keg'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- code box -->
    <div class="container">
        <div class="box">
            <h5>Struktur</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Error quaerat eius illum dolores unde voluptates, quod
                quos laboriosam iusto hic fugit. Voluptate, aperiam
                praesentium nulla et odit excepturi nesciunt quas!
            </p>
        </div>
        <div class="box">
            <h5>Kontak</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Error quaerat eius illum dolores unde voluptates, quod
                quos laboriosam iusto hic fugit. Voluptate, aperiam
                praesentium nulla et odit excepturi nesciunt quas!
            </p>
        </div>
        <div class="box">
            <h5>Tentang</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Error quaerat eius illum dolores unde voluptates, quod
                quos laboriosam iusto hic fugit. Voluptate, aperiam
                praesentium nulla et odit excepturi nesciunt quas!
            </p>
        </div>
    </div>
    <div class="footer">
        <p>Copyright@UKMTechCode_2021</p>
    </div>
</body>

</html>