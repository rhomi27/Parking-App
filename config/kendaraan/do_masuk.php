<?php
date_default_timezone_set("Asia/Bangkok");

require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $jam_masuk = date("Y-m-d H:i:s");

    // Update jam masuk di tabel kendaraan
    $query_update_jam_masuk = "UPDATE kendaraan SET jam_masuk='$jam_masuk' WHERE id='$id'";
    $result_update_jam_masuk = $koneksi->query($query_update_jam_masuk);

    if ($result_update_jam_masuk) {
        // Update jam masuk di tabel history_parkir
        $query_update_jam_masuk_history = "UPDATE history_parkir SET jam_masuk='$jam_masuk' WHERE id='$id'";
        $result_update_jam_masuk_history = $koneksi->query($query_update_jam_masuk_history);

        if ($result_update_jam_masuk_history) {
            // Berhasil memperbarui data jam masuk di kedua tabel
            header("Location: ../../admin/kendaraan.php");
            exit();
        } else {
            // Gagal memperbarui data jam masuk di tabel history_parkir
            header("Location: ../../admin/kendaraan.php?error=GagalMemperbaruiJamMasukHistory");
            exit();
        }
    } else {
        // Gagal memperbarui data jam masuk di tabel kendaraan
        header("Location: ../../admin/kendaraan.php?error=GagalMemperbaruiJamMasuk");
        exit();
    }
}

$koneksi->close();
?>
