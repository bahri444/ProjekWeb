<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:moduls.php');
}
include "ModelModul.php";
$moduls = new ModelModul();
$id = $_GET['id'];
$moduls->delete($id);
header('location:moduls.php');