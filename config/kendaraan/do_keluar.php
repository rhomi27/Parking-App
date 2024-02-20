<?php
date_default_timezone_set("Asia/Bangkok");
session_start();

require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $jam_keluar = date("Y-m-d H:i:s");

    $id_user = $_SESSION['user_id'];
    // Mengambil data kendaraan berdasarkan ID dan harga dari jenisKendaraan
    $query_select = "SELECT kendaraan.*, jenisKendaraan.harga 
                     FROM kendaraan 
                     INNER JOIN jenisKendaraan ON kendaraan.id_jenisKendaraan = jenisKendaraan.id_jenisKendaraan 
                     WHERE kendaraan.id='$id' AND kendaraan.user_id='$id_user'";
    $result_select = $koneksi->query($query_select);

    if ($result_select->num_rows > 0) {
        $row = $result_select->fetch_assoc();
        $jam_masuk = $row["jam_masuk"];
        $nomor_polisi = $row["nomor_polisi"];
        $harga = $row["harga"];

        // Menghitung durasi parkir dalam detik
        $durasi_parkir = strtotime($jam_keluar) - strtotime($jam_masuk);

        // Menghitung durasi parkir dalam jam
        $durasi_parkir_jam = $durasi_parkir / 3600;

        // Menghitung harga parkir baru berdasarkan durasi parkir
        if ($durasi_parkir_jam < 1) {
            // Durasi kurang dari 1 jam, menggunakan harga awal
            $total_bayar = $harga;
        } elseif ($durasi_parkir_jam < 2) {
            // Durasi antara 1 jam (inklusif) dan 2 jam (eksklusif), harga dikalikan 2
            $total_bayar = $harga * 2;
        } else {
            // Durasi lebih dari atau sama dengan 2 jam, harga dikalikan dengan faktor
            $faktor = ceil($durasi_parkir_jam); // Menentukan faktor pengali (berdasarkan durasi parkir)
            $total_bayar = $harga * $faktor;
        }

        // Simpan data historis parkir
        $historyQuery = mysqli_query($koneksi, "INSERT INTO history_parkir (nomor_polisi, jam_masuk, jam_keluar, total_bayar, user_id) VALUES ('$nomor_polisi', '$jam_masuk', '$jam_keluar', '$total_bayar', '$id_user')");

        if ($historyQuery) {
            // Update jam keluar dan total bayar di tabel kendaraan
            $updateQuery = mysqli_query($koneksi, "UPDATE kendaraan SET jam_keluar='$jam_keluar', total_bayar='$total_bayar' WHERE id='$id'");

            if ($updateQuery) {
                // Berhasil memperbarui data dan menyimpan data historis parkir
                header("Location: ../../admin/kendaraan.php");
                exit();
            } else {
                // Gagal memperbarui data
                header("Location: ../../admin/kendaraan.php?error=GagalMemperbaruiData");
                exit();
            }
        } else {
            // Gagal menyimpan data historis parkir
            header("Location: ../../admin/kendaraan.php?error=PenyimpananHistorisGagal");
            exit();
        }
    } else {
        // Kendaraan dengan id yang diberikan tidak ditemukan
        header("Location: ../../admin/kendaraan.php?error=KendaraanTidakDitemukan");
        exit();
    }
}

$koneksi->close();
?>
