<?php 
session_start();
 
include "../connect.php";
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 
$login = mysqli_query($koneksi,"SELECT * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	$_SESSION['username'] = $username;
	$_SESSION['level'] = $data['level'];
	$_SESSION['status'] = "login";
	if($data['level']=="admin"){
		header("location:../admin/dashboard.php");
	}else if($data['level']=="karyawan"){
		header("location:../karyawan/daftar-transaksi.php");
	}else if($data['level']=="user"){
		header("location:../client/dashboard.php");
	}
}else{
	echo "<script>alert('Username atau Password salah!');window.location='../security/form-login.php'</script>";
	header("location:../security/form-login.php");
}
