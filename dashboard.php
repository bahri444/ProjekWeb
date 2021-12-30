<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
include "newcon.php";
$datamodul = mysqli_query($koneksi, "SELECT nm_mod FROM moduls GROUP BY nm_mod");
$css = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod=('css')");
$go = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod='go'");
$html = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod='html'");
$java = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod=('java')");
$php = mysqli_query($koneksi, "SELECT nm_mod FROM moduls WHERE nm_mod=('php')");

// query untuk mengambil jumlah data pada tabel member
$len = mysqli_query($koneksi, "SELECT nama FROM member ORDER BY nama");
$hitung_jml = mysqli_num_rows($len);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="ChartJs/Chart.min.js"></script>
    <title>dashboard</title>
</head>

<body>
    <div class="containerdash">
        <div class="header">
            <div class="headerleft">
                <h2>UKM TechCode</h2>
            </div>
            <div class="headerright">
                <div class="headsubright">
                    <div class="comment">
                        <a href="comment.php"><img src="image/chatt.png" alt=""></a>
                    </div>
                    <div class="profile_user">
                        <a href="profile.php"><img src="image/profile.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="isi">
            <div class="dashboard">
                <div class="icondashboard">
                    <div class="logodashboard">
                        <img src="image/Logo_ukmTechcode.png" alt="">
                    </div>
                    <span>Sistem Informasi<br> UKM Technology Code</span>
                </div>
                <div class="menu"><a href="foto.php">Galery</a></div>
                <div class="menu"><a href="member.php">Member</a></div>
                <div class="menu"><a href="moduls.php">Modul</a></div>
                <div class="menu"><a href="kegiatan.php">Kegiatan</a></div>
                <div class="menu"><a href="user.php">User</a></div>
                <div class="menu"><a href="index.php">Keluar</a></div>
            </div>
            <div class="isisub">
                <div class="diagram">
                    <div class="box12">
                        <div class="box">
                            <p>Software Web<br>
                                Software Desktop<br>
                                Software Android</p>
                        </div>
                        <div class="box">
                            <p><?= $hitung_jml ?><br>Orang</p>
                            <a href="member.php">lihat detail</a>
                        </div>
                    </div>
                    <div class="box2">
                        <canvas id="moduls">></canvas>
                        <script>
                            var ctx = document.getElementById("moduls").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [<?php while ($row = mysqli_fetch_array($datamodul)) {
                                                    echo '"' . $row['nm_mod'] . '",';
                                                } ?>],
                                    datasets: [{
                                        label: '',
                                        data: [
                                            <?= mysqli_num_rows($css) ?>,
                                            <?= mysqli_num_rows($go) ?>,
                                            <?= mysqli_num_rows($html) ?>,
                                            <?= mysqli_num_rows($java) ?>,
                                            <?= mysqli_num_rows($php) ?>,
                                            0,
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
            </div>
        </div>
    </div>
</body>

</html>