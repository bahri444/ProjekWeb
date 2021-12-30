<?php
include "newcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="styleform.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <title>Formlogin</title>
    <style>
        *{
            font-family: 'Roboto Condensed', sans-serif;
        }
    </style>
</head>
<body>
    <div class="containerlog">
        <div class="logleft">
            <div class="foto">
                <img src="image/Logo_ukmTechcode.png" alt="">
            </div>
            <span>Sistem Informasi <br> UKM TechCode</span>
        </div>
        <div class="logright">
            <div class="teks">Login</div>
            <form method="post">
                <label for=""></label>
                <input type="text" name="username" placeholder="username">
               
                <label for=""></label>
                <input type="password" name="password" placeholder="password">
                
                <div class="tombol">
                    <div class="tombol1">
                        <a href="index.php">Kembali</a>
                    </div>
                    <div class="tombol2">
                        <button type="submit" name="login">Masuk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>