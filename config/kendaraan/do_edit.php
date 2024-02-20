<?php
date_default_timezone_set("Asia/Bangkok");

session_start();

if(!isset($_SESSION['login'])){
  header("location:../login.php");
  exit;
}

include "../config.php";

$id = $_POST['id'];
$nomorP = $_POST['nomor_polisi'];
$namaK = $_POST['nama_kendaraan'];
$merkK = $_POST['merk_kendaraan'];
$jenisK = $_POST['jenis_kendaraan'];

$query = mysqli_query($koneksi,"UPDATE kendaraan SET nomor_polisi='$nomorP',nama_kendaraan='$namaK',merk_kendaraan='$merkK',id_jenisKendaraan='$jenisK' WHERE id='$id'");

if($query){
    header("location:../../admin/kendaraan.php");
}else{
    header("location:../../admin/kendaraan.php");
}
?>