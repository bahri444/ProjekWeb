<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:login.php');
}
include "ModelUser.php";
$user = new ModelUser();
$id = $_GET['id'];
$user->delete($id);
header('location:user.php');
