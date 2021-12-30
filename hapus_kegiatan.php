<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:kegiatan.php');
}
include "ModelKegiatan.php";
$kegiatan = new ModelKegiatan();
$id = $_GET['id'];
$kegiatan->delete($id);
header('location:kegiatan.php');