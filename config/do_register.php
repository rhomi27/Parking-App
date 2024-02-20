<?php
session_start();
include "config.php";

$username = strtolower(stripslashes($_POST['username']));
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$password2 = mysqli_real_escape_string($koneksi, $_POST['password2']);
$alamat = strtolower(stripslashes($_POST['alamat']));

if ($password !== $password2) {
    echo "<script>
        alert('Konfirmasi Password Tidak Sesuai!');
        window.location.href='../login.php';
    </script>";
    exit;
}

if (strlen($password) < 6) {
    echo "<script>
        alert('Password harus terdiri dari setidaknya 6 karakter!');
        window.location.href='../login.php';
    </script>";
    exit;
}

$password = password_hash($password, PASSWORD_DEFAULT);

$query = mysqli_query($koneksi, "INSERT INTO user (id, username, password, alamat) VALUES ('', '$username', '$password', '$alamat')");

if ($query) {
    // Mendapatkan ID pengguna dari baris yang baru ditambahkan
    $id_user = mysqli_insert_id($koneksi);

    $_SESSION['id'] = $id_user; // Mengatur session id
    echo "<script>
        alert('Registrasi berhasil, silahkan login kembali!');
        window.location.href='../login.php';
    </script>";
} else {
    echo "<script>
        alert('Registrasi gagal! Silahkan Registrasi Kembali!');
        window.location.href='../login.php';
    </script>";
}
?>
