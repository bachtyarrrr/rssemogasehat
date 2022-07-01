<?php 
    include "../config/connect.php";
    
    $result = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM users");
    $row = mysqli_fetch_assoc($result);
    $count = $row['jumlah'];
    $no = (int)$count + 1;

    $cek_user=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username='$_POST[username]'"));
    if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("Username Sudah Ada Yang Menggunakan");
              window.location="signup.php";
              </script>';
              exit();
    }
    else {
        mysqli_query($conn, "INSERT INTO users (id, username, nama, password)
        VALUES ('$no', '$_POST[username]', '$_POST[nama]', '$_POST[password]')");
        
        echo '<script language="javascript">
              alert ("Registrasi Berhasil Di Lakukan!");
              window.location="index.php";
              </script>';
              exit();
    }
?>