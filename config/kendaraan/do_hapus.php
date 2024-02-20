<?php

session_start();

if(!isset($_SESSION['login'])){
    header("location:../login.php");
    exit;
}

include "../config.php";
$id = $_GET['id'];

$query = mysqli_query($koneksi,"DELETE FROM history_parkir WHERE id='$id'");

if($query){
    header("location:../../admin/history.php");

}else{
    header("location:../../admin/history.php");
}
?>