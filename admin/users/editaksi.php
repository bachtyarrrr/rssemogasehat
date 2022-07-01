<?php 
// koneksi database
include '../../config/connect.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
 
// update data ke database
mysqli_query($conn,"update users set username='$username', nama='$nama', password='$password' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>