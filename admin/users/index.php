<?php
require_once "../../config/connect.php";
require_once "../include/header.php";

session_start();
if ($_SESSION['status'] != "login") {
    header("location:login/index.php?pesan=belum_login");
}

$users = mysqli_query($conn, "SELECT * FROM users");
?>

<body class="fix-header card-no-border fix-sidebar">
    <?php require_once "../include/preloader.php"; ?>
    <div id="main-wrapper">
        <header class="topbar">
            <?php require_once "../include/navbar.php"; ?>
        </header>
        <?php require_once "../include/sidebar.php"; ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">User</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
                <!-- Start Page Content -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Users</h4>
                                <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                                <div>
                                    <a href="tambah.php">
                                        <button class="btn btn-primary">Tambah Data</button>
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Password</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($user = mysqli_fetch_object($users)) {
                                            ?>
                                            <tr>
                                                <td><?= $user->id; ?></td>
                                                <td><?= $user->username; ?></td>
                                                <td><?= $user->nama; ?></td>
                                                <td><?= $user->password; ?></td>
                                                <td>
                                                    <div>
                                                        <a href="edit.php?id=<?= $user->id; ?>">
                                                            <button class="btn btn-warning"> Edit</button>
                                                        </a>
                                                        <a href="hapus.php?id=<?= $user->id; ?>">
                                                            <button class="btn btn-danger"> Hapus</button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once "../include/footer.php"; ?>
        </div>
    </div>
    <?php require_once "../include/script.php"; ?>
</body>