<?php
include "../connect.php";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama_customer'];
    $alamat = $_POST['alamat_customer'];
    $nohp = $_POST['telefon_customer'];
    $berat = $_POST['berat'];
    $harga = $berat * 3000;
    $tanggal_transaksi = date("Y-m-d");
    $status = "belum diproses";
    $query = "INSERT INTO transaksi VALUES ('', '$tanggal_transaksi', '$harga', '$berat', '$status', '$nama', '$alamat', '$nohp')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan!')</script>";
        echo "<script>location.href='dashboard.php'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!')</script>";
    }
    // else if values is empty dont insert
}else if(empty($_POST['nama_customer']) || empty($_POST['alamat_customer']) || empty($_POST['telefon_customer']) || empty($_POST['berat']) || empty($_POST['total_transaksi'])){
    echo "<script>alert('Data tidak boleh kosong!')</script>";
}
?>