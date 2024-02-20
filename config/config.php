<?php
$koneksi = mysqli_connect("localhost","root","","parkir");

if (mysqli_connect_errno()){
    echo "koneksi database gagal :".mysqli_connect_error();
}

function rupiah($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return $rupiah;
}
?>