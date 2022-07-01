<?php 
// koneksi database
include '../config/connect.php';
session_start();
$date = date("dmY");
$result = mysqli_query($conn, "SELECT MAX(rekammedis) as kode FROM pasien");
$row = mysqli_fetch_assoc($result);
$kode = $row['kode'];
$addNol = "";
$kode = substr($kode, 10,12);
$kode = (int)$kode + 1;
$incrementKode = $kode;

if (strlen($kode) == 1) {
    $addNol = "00";
} elseif (strlen($kode) == 2) {
    $addNol = "0";
}
$kodeBaru = "RM".$date.$addNol.$incrementKode;

// menangkap data yang di kirim dari form
$rm = $kodeBaru;
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempat = $_POST['tempatlahir'];
$tanggal = $_POST['tanggal'];
$notelp = $_POST['notelp'];
$alamat = $_POST['alamat'];

$id_user = $_SESSION['id'];
// var_dump($alamat);
 
// menginput data ke database
if (mysqli_query($conn,"insert into pasien values('$rm', '$nik', '$nama','$tempat','$tanggal','$notelp','$alamat','$id_user')")) {
    // mengalihkan halaman kembali ke index.php
    header("location:index.php");
} else {
    echo "kesalahan query ".mysqli_error($conn);
}
