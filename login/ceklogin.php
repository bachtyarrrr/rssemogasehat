<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config/connect.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"select * from users where username='$username' and password='$password'");

$users =mysqli_fetch_object($data);
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	$_SESSION['id'] = $users->id;
	header("location:../index.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>