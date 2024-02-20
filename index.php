<?php
date_default_timezone_set("Asia/Bangkok");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WEB Parkir</title>
    <link rel="apple-touch-icon" sizes="76x76" href="vendor/light-bootstrap/assets/img/logoP.jpg">
    <link rel="icon" type="image/png" href="vendor/light-bootstrap/assets/img/logoP.jpg">
    <?php require_once('template/css.php'); ?>
    <style>
        .clock {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            border-radius: 4px;
        }
        .welcome-message {
            text-align: center;
            margin-top: 50px;
            font-size: 32px;
            font-weight: bold;
        }

        .description {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #888;
        }

        .btn-login {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-login:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php require_once('template/nav.php'); ?>

    <!-- Page Content -->
    <div class="container">
        <h3 class="mt-4">
            <div id="clock" class="clock" onload="currentTime()"></div>
            <script>
                function currentTime() {
                    let date = new Date();
                    let hh = date.getHours();
                    let mm = date.getMinutes();
                    let ss = date.getSeconds();
                    let session = "AM";

                    if (hh === 0) {
                        hh = 12;
                    }
                    if (hh > 12) {
                        hh = hh - 12;
                        session = "PM";
                    }

                    hh = (hh < 10) ? "0" + hh : hh;
                    mm = (mm < 10) ? "0" + mm : mm;
                    ss = (ss < 10) ? "0" + ss : ss;

                    let time = hh + ":" + mm + ":" + ss + " " + session;

                    document.getElementById("clock").innerText = time;
                    let t = setTimeout(function () { currentTime() }, 1000);
                }

                currentTime();
            </script>
        </h3>
        <div class="welcome-message">Selamat Datang di WEB Parkir!</div>
        <div class="description">Kami menyediakan layanan parkir yang aman dan nyaman.</div>

        <a href="login.php" class="btn-login">Masuk</a>
    </div>
    </div>

    <!-- /.container -->

    <?php require_once('template/js.php'); ?>
</body>

</html>