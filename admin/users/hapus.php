<?php 
// koneksi database
include '../../config/connect.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from users where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>