<?php
session_start();
include "../connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $_SESSION['username'];
    $sql1 = "UPDATE transaksi SET status = 'dibatalkan' WHERE id_transaksi = '$id'";
    $sql2 = "UPDATE $user SET status = 'dibatalkan WHERE id_transaksi = '$id'";
    $result1 = mysqli_query($koneksi, $sql1);
    $result2 = mysqli_query($koneksi, $sql2);

    if ($result1 && $result2) {
        echo "<script>alert('Transaksi berhasil dibatalkan!');window.location.href='daftar-transaksi.php';</script>";
    } else {
        echo "<script>alert('Transaksi gagal dibatalkan!');window.location.href='daftar-transaksi.php';</script>";
    }
}
?>