<?php
// koneksi database
include '../config/connect.php';
session_start();
$date = date("dmY");
$result = mysqli_query($conn, "SELECT MAX(kode_pendaftaran) as kode FROM pendaftar");
$row = mysqli_fetch_assoc($result);
$kode = $row['kode'];
$addNol = "";
$kode = substr($kode, 10, 12);
$kode = (int)$kode + 1;
$incrementKode = $kode;

if (strlen($kode) == 1) {
    $addNol = "00";
} elseif (strlen($kode) == 2) {
    $addNol = "0";
}
$kodeBaru = "KD" . $date . $addNol . $incrementKode;




// menangkap data yang di kirim dari form
$kd = $kodeBaru;
$id_poli = $_POST['id_poli'];
$tgl = $_POST['tanggal_periksa'];
$date_now = date_create();
$tgl_now = date_format($date_now, "Y-m-d");


if ($tgl != $tgl_now) {
    $data = mysqli_query($conn, "select * from pendaftar where tanggal_periksa='$tgl' and id_pasien='$_SESSION[rekammedis]'");

    $cek = mysqli_num_rows($data);
    if ($cek > 0) {
        $_SESSION['warning'] = "Warning";
        $_SESSION['msg'] = "Data pendaftaran di tgl tersebut sudah ada";
        header("location:confirm.php?pesan=Data-Pendaftaran=di-tgl-tersebut-sudah-ada");
    } else {
        $_SESSION['msg'] = "Berhasil Melakukan Pendaftaran";
        include "phpqrcodelibrary/qrlib.php";

        $dir = "../assets/images/qrcode/";
        $nama_file = $kd . ".png";
        //ECC Level
        $level = QR_ECLEVEL_H;
        //Ukuran pixel
        $UkuranPixel = 6;
        //Ukuran frame
        $UkuranFrame = 4;

        QRcode::png($kd, $dir . $nama_file, $level, $UkuranPixel, $UkuranFrame);

        $r = mysqli_query($conn, "SELECT MAX(nomor_antrian) as jumlah FROM pendaftar where tanggal_periksa = '" . $tgl . "'");
        $rw = mysqli_fetch_assoc($r);
        $count = $rw['jumlah'];
        $no = (int)$count + 1;

        $noantri = $no;
        $id_pasien = $_SESSION['rekammedis'];
        $id_user = $_SESSION['id'];
        $full_dir = $dir . $nama_file;

        $_SESSION['warning'] = "Success";
        // menginput data ke database
        $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pendaftar WHERE id_pasien='$_SESSION[rekammedis]'"));
        if ($cek > 0) {
            $_SESSION['warning'] = "Warning";
            $_SESSION['msg'] = "Anda sudah daftar sebelumnya, tunggu jadwal periksa!";
            header("location:confirm.php?pesan=gagal");
        } else {
            mysqli_query($conn, "insert into pendaftar values('$kd', '$id_pasien', '$tgl','$id_poli','$noantri', '$full_dir', '$id_user')");
            header("location:output.php");
        }
    }
} else {
    $_SESSION['warning'] = "Warning";
    $_SESSION['msg'] = "Mohon pilih tanggal selain tanggal sekarang";
    header("location:confirm.php?pesan=Mohon pilih tanggal selain tanggal sekarang");
}



// if (isset($_GET['output'])) {
// if($cek > 0){
// 	$_SESSION['kode_pendaftaran'] = $id;
// 	header("location:output.php");
// }else{
// 	header("location:confirm.php?pesan=Data Pasien Tidak Ada");
// }
// }