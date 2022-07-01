<?php
session_start();
// menghubungkan dengan koneksi
include '../config/connect.php';

// menangkap data yang dikirim dari form
$id = $_POST['id_poli'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn, "select * from poli where id_poli='$id'");

$poli = mysqli_fetch_object($data);

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($poli);

if ($cek > 0) {
    $_SESSION['id_poli'] = $id;

    header("location:detail.php");
} else {
    header("location:index.php?pesan=Data-Dokter-Tidak-Ditemukan");
}