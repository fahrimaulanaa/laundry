<?php
session_start();
include "../connect.php";
if (isset($_POST['submit'])) {
    $user = $_SESSION['username'];
    $nama = $_SESSION['username'];
    $alamat = $_POST['alamat_customer'];
    $nohp = $_POST['telefon_customer'];
    $berat = $_POST['berat'];
    $harga = $berat * 3000;
    $tanggal_transaksi = date("Y-m-d");
    $status = "belum diproses";
    $query = "INSERT INTO transaksi VALUES ('', '$nama', '$alamat', '$nohp', '$berat', '$harga', '$tanggal_transaksi', '$status')";
    $query2 = "INSERT INTO $user VALUES ('', '$tanggal_transaksi', '$harga', '$berat', '$status', '$nama', '$alamat', '$nohp')";
    $result = mysqli_query($koneksi, $query);
    $result2 = mysqli_query($koneksi, $query2);
    if ($result && $result2) {
        echo "<script>alert('Pesanan Berhasil Ditambahkan'); window.location = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!')</script>";
    }
}
?>