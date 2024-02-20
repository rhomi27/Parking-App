<?php
session_start();

date_default_timezone_set("Asia/Bangkok");

include "../config.php";

$namaP = $_POST['nama_pemilik'];
$nomorP = $_POST['nomor_polisi'];
$namaK = $_POST['nama_kendaraan'];
$merkK = $_POST['merk_kendaraan'];
$jenisK = $_POST['jenis_kendaraan'];
$jam_masuk = date("Y-m-d H:i:s");
$jam_keluar = date("Y-m-d H:i:s");

$id_user = $_SESSION['user_id'];

// Periksa apakah nomor polisi sudah ada dalam database
$checkQuery = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE nomor_polisi = '$nomorP'");
if (mysqli_num_rows($checkQuery) > 0) {
    // Jika nomor polisi sudah ada, maka batalkan penyimpanan
    echo "<script>alert('Plat nomor sudah ada');</script>";
    echo "<script>window.location.href = '../../admin/index.php';</script>";
    exit();
}

$query = mysqli_query($koneksi, "INSERT INTO kendaraan (id, nama_pemilik, nomor_polisi, nama_kendaraan, merk_kendaraan, id_jenisKendaraan, jam_masuk, jam_keluar, user_id) VALUES ('','$namaP','$nomorP','$namaK','$merkK','$jenisK','$jam_masuk', '$jam_keluar', '$id_user')");

if ($query) {
    header("location: ../../admin/kendaraan.php");
} else {
    header("location: ../../admin/kendaraan.php");
}
?>
