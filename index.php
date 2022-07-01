<?php require_once "config/connect.php"; ?>
<?php require_once "include/headerIndex.php"; ?>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login/index.php?pesan=belum_login");
}
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
                        <h3 class="text-themecolor">Pendaftaran Online <b>RS Semoga Sehat</b></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Pendafataran</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- sini -->
                    <div class="col-lg-3 text-center">
                        <div class="card">
                            <div class="card-body">
                                <!-- <div class="d-flex mb-4 no-block">
                                        <h5 class="card-title mb-0 text-center">Pasien</h5>
                                    </div> -->
                                <div>
                                    <img src="assets/images/pasien.png" alt="homepage" class="dark-logo"
                                        style="width: 70px;" />
                                </div>
                                <a href="pendaftaran/tambah.php">
                                    <button class="btn btn-primary">Pasien Baru</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="card">
                            <div class="card-body">
                                <!-- <div class="d-flex mb-4 no-block">
                                        <h5 class="card-title mb-0 text-center">Dokter</h5>
                                    </div> -->
                                <div>
                                    <img src="assets/images/pasien.png" alt="homepage" class="dark-logo"
                                        style="width: 70px;" />
                                </div>
                                <a href="pendaftaran/plama.php">
                                    <button class="btn btn-primary">Pasien Lama</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="card w-100" style="background-color: #F20F38; color: #fff;">
                            <div class="card-body">
                                <p class="mb-0 mt-3"><i class="fa fa-bullhorn"></i><b> Informasi </b></p>
                                <p class="mb-0 mt-3" style="font-family: arial;">
                                    JIKA ANDA BELUM PERNAH DAFTAR/MENDAFTARKAN PASIEN, SILAHKAN MENGISI DATA DENGAN
                                    MEMILIH PASIEN BARU. <br><br>
                                    JIKA SEBELUMNYA ANDA SUDAH PERNAH MENDAFTARKAN PASIEN, MAKA PILIH PASIEN LAMA.
                                </p>
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