<?php 
// koneksi database
include '../../config/connect.php';


    $result = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM users");
    $row = mysqli_fetch_assoc($result);
    $count = $row['jumlah'];
    $no = (int)$count + 1;


    $query = "INSERT INTO users(id, username, nama, password) VALUES('" . $no . "', '" . $_POST['username'] . "',
        '" . $_POST['nama'] . "', '" . $_POST['password'] . "')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "terjadi kesalahan query";
    }
?>