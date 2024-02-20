<?php
date_default_timezone_set("Asia/Bangkok");

session_start();

if (!isset($_SESSION['login'])) {
    header("location:../login.php");
    exit;
}
include "../config.php";

if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    // mengambil data berdasarkan id
    $sql = "SELECT * FROM kendaraan JOIN jenisKendaraan ON kendaraan.id_jenisKendaraan = jenisKendaraan.id_jenisKendaraan WHERE id = $id";
    $result = $koneksi->query($sql);
    foreach ($result as $kendaraan) { ?>
        <table class="table">
        <tr>
                <td>Nama Pemilik</td>
                <td>:</td>
                <td>
                    <?= ucwords($kendaraan['nama_pemilik']); ?>
                </td>
            </tr>
            <tr>
                <td>Plat Nomor</td>
                <td>:</td>
                <td>
                    <?= strtoupper($kendaraan['nomor_polisi']); ?>
                </td>
            </tr>
            <tr>
                <td>Merk Kendaraan</td>
                <td>:</td>
                <td>
                    <?= ucwords($kendaraan['nama_kendaraan']); ?>
                </td>
            </tr>
            <tr>
                <td>Dealer</td>
                <td>:</td>
                <td>
                    <?= ucwords($kendaraan['merk_kendaraan']); ?>
                </td>
            </tr>
            <tr>
                <td>Jenis Kendaraan</td>
                <td>:</td>
                <td>
                    <?= ucwords($kendaraan['jenis_kendaraan']); ?>
                </td>
            </tr>
                <td>Harga Perjam</td>
                <td>:</td>
                <td> Rp.
                    <?= ucwords($kendaraan['harga']); ?>
                </td>
            </tr>
        </table>
        <?php

    }
}
$koneksi->close();
?>