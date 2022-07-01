<?php 
// koneksi database
include '../../config/connect.php';


    $result = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM poli");
    $row = mysqli_fetch_assoc($result);
    $count = $row['jumlah'];
    $no = (int)$count + 1;


    $query = "INSERT INTO poli(id_poli ,nama_poli) VALUES('" . $no . "',
        '" . $_POST['nama_poli'] . "')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "terjadi kesalahan query";
    }
?>