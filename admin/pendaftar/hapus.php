<?php 
// koneksi database
include '../../config/connect.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['kode_pendaftaran'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from pendaftar where kode_pendaftaran='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");