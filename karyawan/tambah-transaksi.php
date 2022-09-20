<?php
session_start();
include "../connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $_SESSION['username'];
    $sql1 = "UPDATE transaksi SET status = 'diproses' WHERE id_transaksi = '$id'";
    $sql2 = "UPDATE $user SET status = 'diproses' WHERE id_transaksi = '$id'";
    $sql3 = "UPDATE gudang SET jumlah = jumlah - 1 WHERE id_barang = (SELECT id_barang FROM transaksi WHERE id_transaksi = '$id') ";
    $result1 = mysqli_query($koneksi, $sql1);
    $result2 = mysqli_query($koneksi, $sql2);
    $result3 = mysqli_query($koneksi, $sql3);
    if ($result1 && $result2 && $result3) {
        echo "<script>alert('Data berhasil diubah!')</script>";
        echo "<script>location.href='daftar-transaksi.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah!')</script>";
    }
}
?>