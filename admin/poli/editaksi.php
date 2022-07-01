<?php 
// koneksi database
include '../../config/connect.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id_poli'];
$nama = $_POST['nama_poli'];
 
// update data ke database
mysqli_query($conn,"update users set nama_poli='$nama' where id_poli='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>