<?php 
// koneksi database
include '../../config/connect.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_dokter'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from dokter where id_dokter='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>