<?php
session_start();

if (isset($_SESSION['login'])) {
    header("location:admin/index.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="vendor/light-bootstrap/assets/img/logoP.jpg">
    <link rel="icon" type="image/png" href="vendor/light-bootstrap/assets/img/logoP.jpg">

    <?php require_once('template/css.php'); ?>
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Login</title>
    <style>
                  body {
            background-image: url("assets/img/orig.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            height: 100vh; /* Menetapkan tinggi elemen body 100% viewport height */
        }

        @media (max-width: 767px) {
            body {
                background-size: contain;
            }
        }

        @media (max-width: 1024px) and (max-height: 1366px) {
            body {
                background-size: cover;
            }
        }
    </style>
</head>

<body>


    <div class="login-page">
        <div class="form">
            <form class="register-form" method="post" action="config/do_register.php">
                <input type="text" placeholder="Nama Pengguna" name="username" required/>
                <input type="text" placeholder="Alamat" name="alamat" required/>
                <input type="password" placeholder="Kata Sandi" name="password" required/>
                <input type="password" placeholder="Konfirmasi Sandi" name="password2" required/>
                <button>Daftar</button>
                <p class="message">Sudah Daftar? <a href="#">Masuk</a></p>
            </form>
            <form class="login-form" method="post" action="config/do_login.php">
                <input type="text" placeholder="Nama Pengguna" name="username" required/>
                <input type="password" placeholder="Kata Sandi" name="password" required/>
                <button>Masuk</button>
                <p class="message">Belum Daftar? <a href="#">Buat Akun Baru</a></p>
            </form>
        </div>
    </div>

    <?php require_once('template/js.php'); ?>
</body>

</html>