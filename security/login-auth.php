<?php 
session_start();
 
include "../connect.php";
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 
$login = mysqli_query($koneksi,"SELECT * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	if($data['level']=="admin"){
 
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		header("location:../admin/admin-datakaryawan.php");
 
	}else if($data['level']=="karyawan"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "karyawan";
		header("location:../karyawan/daftar-transaksi.php");
 
	}else if($data['level']=="pengurus"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pengurus";
		header("location:halaman_pengurus.php");
 
	}else{
 
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
