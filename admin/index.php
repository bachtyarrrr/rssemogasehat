<?php
require_once "../config/connect.php";
require_once "include/headerIndex.php";

session_start();
if ($_SESSION['status'] != "login") {
    header("location:login/index.php?pesan=belum_login");
}

$pasien = mysqli_query($conn, "SELECT COUNT(*) FROM pasien");
$dokter = mysqli_query($conn, "SELECT COUNT(*) FROM dokter");
$pendaftar = mysqli_query($conn, "SELECT COUNT(*) FROM pendaftar");

$total_pasien = mysqli_fetch_array($pasien)[0];
$total_dokter = mysqli_fetch_array($dokter)[0];
$total_pendaftar = mysqli_fetch_array($pendaftar)[0];


?>

<body class="fix-header fix-sidebar card-no-border">
    <?php require_once "include/preloader.php"; ?>
    <div id="main-wrapper">
        <header class="topbar">
            <?php require_once "include/navbarIndex.php"; ?>
        </header>
        <?php require_once "include/sidebarIndex.php"; ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- sini -->
                    <div class="col-lg-3 text-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4 no-block">
                                    <h5 class="card-title mb-0 text-center">Pasien</h5>
                                </div>
                                <div>
                                    <img src="assets/images/pasien.png" alt="homepage" class="dark-logo"
                                        style="width: 70px;" />
                                </div>
                                <div>
                                    <i style="font-family: Helvetica; font-size: 50px;"><?= $total_pasien; ?></i><br>
                                    <!-- <a href="pasien/"> -->
                                    <i style="font-family: arial;">Total Pasien</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4 no-block">
                                    <h5 class="card-title mb-0 text-center">Dokter</h5>
                                </div>
                                <div>
                                    <img src="assets/images/pasien.png" alt="homepage" class="dark-logo"
                                        style="width: 70px;" />
                                </div>
                                <div>
                                    <i style="font-family: Helvetica; font-size: 50px;"><?= $total_dokter; ?></i><br>
                                    <i style="font-family: arial;">Total Dokter</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4 no-block">
                                    <h5 class="card-title mb-0 text-center">Pendaftar Online</h5>
                                    <!-- <div class="ms-auto">
                                    <select class="form-select b-0">
                                        <option selected="">Today</option>
                                        <option value="1">Tomorrow</option>
                                    </select>
                                </div> -->
                                </div>
                                <div>
                                    <img src="assets/images/pasien.png" alt="homepage" class="dark-logo"
                                        style="width: 70px;" />
                                </div>
                                <div>
                                    <i style="font-family: Helvetica; font-size: 50px;"><?= $total_pendaftar; ?></i><br>
                                    <i style="font-family: arial;">Total Pendaftar Online</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php require_once "include/footerIndex.php"; ?>
    </div>
    </div>
    <?php require_once "include/scriptIndex.php"; ?>
</body>