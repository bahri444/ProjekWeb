<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('location:login.php');
}
include "ModelMember.php";
$member = new ModelMember();
$id = $_GET['id'];
$member->delete($id);
header('location:member.php');