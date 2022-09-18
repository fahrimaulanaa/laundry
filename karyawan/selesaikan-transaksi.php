<?php
session_start();
include "../connect.php";

if (isset($_GET['id_transaksi'])) {
    $id = $_GET['id_transaksi'];
    $user = $_SESSION['username'];
    $sql1 = "UPDATE transaksi SET status = 'selesai' WHERE id_transaksi = '$id'";
    $sql2 = "UPDATE $user SET status = 'selesai' WHERE nama_customer = '$user'";
    $result1 = mysqli_query($koneksi, $sql1);
    $result2 = mysqli_query($koneksi, $sql2);
    if ($result1 && $result2) {
        echo "<script>alert('Transaksi Berhasil diselesaikan!');window.location.href='transaksi-berlangsung.php';</script>";
    } else {
        echo "<script>alert('Transaksi Gagal diselesaikan!');window.location.href='transaksi-berlangsung.php';</script>";
    }
}
?>