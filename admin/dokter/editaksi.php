<?php 
// koneksi database
include '../../config/connect.php';
 
// menangkap data yang di kirim dari form
$id_dokter = $_POST['id_dokter'];
$nama_dokter = $_POST['nama_dokter'];
 
// update data ke database
mysqli_query($conn,"update dokter set nama_dokter='$nama_dokter' where id_dokter='$id_dokter'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>