<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../config/connect.php';

// menangkap data yang dikirim dari form
$id = $_POST['rekammedis'];
$tanggal = $_POST['tanggal'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn, "select * from pasien where rekammedis='$id' and tanggal='$tanggal'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['rekammedis'] = $id;
    $_SESSION['warning'] = "Warning";

    $_SESSION['msg'] = "Sebelum Mengklik daftar, pastikan pasien yang baru daftar memilih daftar pasien lama <a href='../index.php'>dihalaman awal</a>
    untuk reservasi online!";
    header("location:index.php?pesan=gagal");
} else {
    header("location:confirm.php");
}