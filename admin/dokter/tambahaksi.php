<?php 
// koneksi database
include '../../config/connect.php';


    $result = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM dokter");
    $row = mysqli_fetch_assoc($result);
    $count = $row['jumlah'];
    $no = (int)$count + 1;


    $query = "INSERT INTO dokter(id_dokter, id_poli, nama_dokter) VALUES('" . $no . "', '" . $_POST['id_poli'] . "',
        '" . $_POST['nama_dokter'] . "')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "terjadi kesalahan query";
    }
