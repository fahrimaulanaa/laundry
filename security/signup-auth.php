<?php
include "../connect.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id_user'];
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = "user";
    $tanggal_daftar = date("Y-m-d");
    $query = "INSERT INTO user VALUES ('$id','$nama','$username', '$password', '$level')";
    $result = mysqli_query($koneksi, $query);
    $query2 = "CREATE TABLE $username (
        id_transaksi INT(11) NOT NULL AUTO_INCREMENT,
        tanggal_transaksi DATE NOT NULL,
        total_transaksi INT(11) NOT NULL,
        berat INT(11) NOT NULL,
        status VARCHAR(20) NOT NULL,
        nama_customer VARCHAR(50) NOT NULL,
        alamat_customer VARCHAR(100) NOT NULL,
        telefon_customer VARCHAR(20) NOT NULL,
        tanggal_dafar DATE NOT NULL,
        PRIMARY KEY (id_transaksi)
    )";
    $result2 = mysqli_query($koneksi, $query2);
    if ($result && $result2) {
        echo "<script>alert('Data berhasil ditambahkan!')</script>";
        echo "<script>location.href='dashboard.php'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!')</script>";
    }
} else if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['level'])) {
    echo "<script>alert('Data tidak boleh kosong!')</script>";
}
?>
