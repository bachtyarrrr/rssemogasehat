<?php 
// koneksi database
include '../../config/connect.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['rekammedis'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$tempat = $_POST['tempatlahir'];
$tanggal = $_POST['tanggal'];
$alamat = $_POST['alamat'];
 
// update data ke database
mysqli_query($conn,"update users set nik='$nik', name='$name', tempatlahir='$tempat', tanggal='$tanggal', alamat='$alamat'  where rekammedis='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>