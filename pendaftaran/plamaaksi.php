<?php
session_start();
// menghubungkan dengan koneksi
include '../config/connect.php';

// menangkap data yang dikirim dari form
$id = $_POST['rekammedis'];
$tanggal = $_POST['tanggal'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn, "select * from pasien where rekammedis='$id' and tanggal='$tanggal'");

$pasien = mysqli_fetch_object($data);

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
	$_SESSION['rekammedis'] = $id;

	header("location:confirm.php");
} else {
	header("location:plama.php?pesan=Data-Pasien-Tidak-Ada");
}