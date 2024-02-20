<?php
session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>window.location.href = '../login.php';</script>";
    exit;
}

require_once "../config/config.php";
date_default_timezone_set("Asia/Bangkok");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../vendor/light-bootstrap/assets/img/logoP.jpg">
    <link rel="icon" type="image/png" href="../vendor/light-bootstrap/assets/img/logoP.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Web Parkir</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <?php require_once('template/css.php'); ?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../vendor/light-bootstrap/assets/img/tmptParkir.jpeg">
            <?php require_once('template/sidebar.php'); ?>
        </div>
        <div class="main-panel">

            <!-- Navbar -->
            <?php require_once('template/nav.php'); ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">


                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title"><b>Riwayat Parkir</b></h4>
                            <hr>
                        </div>

                        <div class="card-body ">

                            <table>
                                <tr>
                                    <th>Plat Nomor</th>
                                    <th>Waktu Masuk</th>
                                    <th>Waktu Keluar</th>
                                    <th>Total Bayar</th>
                                    <th></th>
                                </tr>
                                <?php
                                // Query untuk mengambil data riwayat parkir dari database
                                $id_user = $_SESSION['user_id'];
                                $historyQuery = mysqli_query($koneksi, "SELECT * FROM history_parkir WHERE user_id = '$id_user'");
                                while ($row = mysqli_fetch_assoc($historyQuery)): ?>
                                    <tr>
                                        <td>
                                            <?= strtoupper($row["nomor_polisi"]); ?>
                                        </td>
                                        <td>
                                            <?= $row["jam_masuk"]; ?>
                                        </td>
                                        <td>
                                            <?= $row["jam_keluar"]; ?>
                                        </td>
                                        <td>
                                            <?= $row["total_bayar"]; ?>
                                        </td>
                                        <td><a href="../config/kendaraan/do_hapus.php?id=<?= $row['id']; ?>"
                                                class="btn btn-danger float-right ml-1"><i
                                                    class="bi bi-file-earmark-x"></i></a></td>
                                    </tr>
                                <?php endwhile; ?>

                            </table>

                        </div>

                        <!-- Modal -->
                        <?php include "template/modal.php"; ?>
                        <!-- End Modal -->
                    </div>

                </div>
            </div>
            <?php require_once('template/footer.php'); ?>
        </div>
    </div>
    </div>
    <?php require_once('template/js.php'); ?>
</body>

</html>