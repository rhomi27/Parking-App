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

    <link rel="stylesheet" type="text/css" href="struk-parkir.css">
    <style>
        @media print {

            /* Gaya cetak khusus di sini */
            /* Misalnya, mengubah warna latar belakang menjadi putih */
            body {
                background-color: #fff;
            }

            /* Menyembunyikan tombol cetak */
            .btn-print {
                display: none;
            }

            /* Menyesuaikan tampilan elemen lainnya untuk cetak */
            /* Anda dapat menyesuaikan sesuai kebutuhan */
        }
    </style>
</head>

<body>
    <!-- Konten halaman Anda -->
    <div class="wrapper">
        <?php
        date_default_timezone_set("Asia/Bangkok");

        session_start();

        if (!isset($_SESSION['login'])) {
            header("location:../login.php");
            exit;
        }
        include "../config.php";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // mengambil data berdasarkan id
            $data = mysqli_query($koneksi, "SELECT * FROM kendaraan JOIN jenisKendaraan ON kendaraan.id_jenisKendaraan = jenisKendaraan.id_jenisKendaraan WHERE id = $id");
            if (mysqli_num_rows($data) > 0) {
                $kendaraan = mysqli_fetch_assoc($data);
                ?>
                <div id="strukParkir" class="struk-parkir">
                    <div class="header">
                        <div class="logo">
                            <img src="../vendor/light-bootstrap/assets/img/logoP.jpg">
                        </div>
                        <h2>STRUK PARKIR</h2> <br>
                        <div class="store-info">
                            <?php
                            // Mengambil nama petugas dan alamat dari tabel user berdasarkan username
                            $username = $_SESSION['user']['username'];
                            $userQuery = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
                            $user = mysqli_fetch_assoc($userQuery);
                            ?>
                            <div class="store-name">Petugas
                                <?= $user['username']; ?>
                            </div>
                            <div class="store-address">Alamat ,
                                <?= $user['alamat']; ?>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <table class="table">
                        <tr>
                            <td>Nama Pemilik</td>
                            <td>:</td>
                            <td>
                                <?= ucwords($kendaraan['nama_pemilik']); ?>
                                <hr>
                            </td>

                        </tr>
                        <tr>
                            <td>Plat Nomor</td>
                            <td>:</td>
                            <td>
                                <?= strtoupper($kendaraan['nomor_polisi']); ?>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Merk Kendaraan</td>
                            <td>:</td>
                            <td>
                                <?= ucwords($kendaraan['nama_kendaraan']); ?>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Dealer</td>
                            <td>:</td>
                            <td>
                                <?= ucwords($kendaraan['merk_kendaraan']); ?>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kendaraan</td>
                            <td>:</td>
                            <td>
                                <?= ucwords($kendaraan['jenis_kendaraan']); ?>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Jam Masuk</td>
                            <td>:</td>
                            <td>
                                <?= ucwords($kendaraan["jam_masuk"]); ?>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Jam Keluar</td>
                            <td>:</td>
                            <td>
                                <?= ucwords($kendaraan["jam_keluar"]); ?>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Total Bayar</td>
                            <td>:</td>
                            <td> Rp.
                                <?= ucwords($kendaraan['total_bayar']); ?>
                                <hr>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php
            } else {
                echo "Data kendaraan tidak ditemukan.";
            }
        } else {
            echo "ID kendaraan tidak valid.";
        }

        $koneksi->close();
        ?>
    </div>
    <button class="btn btn-primary btn-print" onclick="printPage()">Cetak</button>

    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>

</html>