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
    <!-- css -->
    <?php require_once('template/css.php'); ?>
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">DATA KENDARAAN</h4>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <form action="kendaraan.php" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Cari Kendaraan.."
                                                    name="cari" id="cari">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit"
                                                        id="tombolCari">Cari</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <div class="row text-center mt-2">
                                    <div class="col-md-6">
                                        <?php
                                        if (isset($_GET['cari'])) {
                                            $cari = $_GET['cari'];
                                            echo "<div class='text-muted text-center'>Hasil Pencarian '$cari'</div>";
                                            echo "<a class='badge badge-primary' href='kendaraan.php'>Kembali</a>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    if (isset($_GET['cari'])) {
                                        $cari = $_GET['cari'];
                                        $query = "SELECT * FROM kendaraan JOIN jenisKendaraan ON kendaraan.id_jenisKendaraan = jenisKendaraan.id_jenisKendaraan WHERE nomor_polisi LIKE '%$cari%' OR nama_kendaraan LIKE '%$cari%' OR merk_kendaraan LIKE '%$cari%' OR nama_pemilik LIKE '%$cari%'";
                                    } else {
                                        $query = "SELECT * FROM kendaraan JOIN jenisKendaraan ON kendaraan.id_jenisKendaraan = jenisKendaraan.id_jenisKendaraan WHERE kendaraan.user_id = '$_SESSION[user_id]'";
                                    }
                                    $result = mysqli_query($koneksi, $query);
                                    while ($kendaraan = mysqli_fetch_assoc($result)):
                                        ?>
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Pemilik:
                                                    <?= ucwords($kendaraan['nama_pemilik']); ?>
                                                </div>
                                                <div class="card-header">
                                                    <h5 class="card-title text-primary">
                                                        <?= strtoupper($kendaraan['nomor_polisi']); ?>
                                                    </h5>
                                                </div>
                                                <div class="card-body text-success">
                                                    <h5 class="card-title">
                                                        <?= ucwords($kendaraan['merk_kendaraan']); ?>
                                                        <?= ucwords($kendaraan['nama_kendaraan']); ?>
                                                    </h5>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Harga Perjam: Rp.
                                                        <?= rupiah($kendaraan['harga']); ?>
                                                    </li>
                                                    <li class="list-group-item">Jam Masuk:
                                                        <?= $kendaraan["jam_masuk"]; ?>
                                                    </li>
                                                </ul>
                                                <div class="card-footer">
                                                    <br>
                                                    <a href="../config/kendaraan/do_print.php?id=<?= $kendaraan['id']; ?>"
                                                        class="btn btn-info float-right ml-2">Cetak</a>
                                                    <a href="../config/kendaraan/do_masuk.php?id=<?= $kendaraan['id']; ?>"
                                                        class="btn btn-warning float-right ml-2">Masuk</a>
                                                    <a href='#myModal' class='btn btn-primary float-right ml-1' id='custId'
                                                        data-toggle='modal' data-id="<?= $kendaraan['id']; ?>">Detail</a>
                                                    <a href="../config/kendaraan/do_keluar.php?id=<?= $kendaraan['id']; ?>"
                                                        class="btn btn-success float-right ml-1">Keluar</a>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <!-- Modal -->
                            <?php include "template/modal.php"; ?>
                            <!-- End Modal -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <?php require_once('template/footer.php'); ?>
        </div>
    </div>
    <!-- js -->
    <?php require_once('template/js.php'); ?>
</body>

</html>