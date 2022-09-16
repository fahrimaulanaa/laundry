<?php 
session_start();
 
include "../connect.php";
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	if($data['level']=="admin"){
 
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		header("location:halaman_admin.php");
 
	}else if($data['level']=="karyawan"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "karayawan";
		header("location:../karyawan/header.php");
 
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
