<?php
session_start();
include "../config.php";

$jenisK = $_POST['jenis_kendaraan'];
$harga = $_POST['harga'];

$user_id = $_SESSION['user_id'];

$query = mysqli_query($koneksi, "INSERT INTO jenisKendaraan (jenis_kendaraan, harga, user_id) VALUES ('$jenisK', '$harga', '$user_id')");

if ($query) {
    header("location: ../../admin/jenis_kendaraan.php");
} else {
    header("location: ../../admin/jenis_kendaraan.php");
}
?>
