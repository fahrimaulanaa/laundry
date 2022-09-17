<?php
include "../connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE transaksi SET status = 'dibatalkan' WHERE id_transaksi = '$id'";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        echo "<script>alert('Transaksi berhasil dibatalkan!');window.location.href='daftar-transaksi.php';</script>";
    } else {
        echo "<script>alert('Transaksi gagal dibatalkan!');window.location.href='daftar-transaksi.php';</script>";
    }
}
?>