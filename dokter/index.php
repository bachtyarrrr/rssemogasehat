<?php require_once "../config/connect.php"; ?>
<?php require_once "../include/header.php"; ?>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login/index.php?pesan=belum_login");
}
?>

<body class="fix-header fix-sidebar card-no-border">
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
                        <h3 class="text-themecolor">Daftar Nama Dokter</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Dokter</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- sini -->
                    <?php
                    require_once "../config/connect.php";
                    $dokter = mysqli_query($conn, "SELECT a.*, b.nama_poli from dokter as a 
                                            inner join poli as b on a.id_poli = b.id_poli order by a.id_dokter asc;");
                    while ($d = mysqli_fetch_object($dokter)) {
                    ?>
                    <div class="col-lg-4 text-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <img src="../assets/images/dokter.png" alt="homepage" class="dark-logo"
                                        style="width: 70px;" />
                                </div><br>
                                <div>
                                    <label for="exampleInputEmail1" class="card-title mb-0"
                                        title="<?= $d->nama_dokter; ?>"><?= substr($d->nama_dokter, 0, 30); ?></label>
                                </div>
                                <div>
                                    <label for="exampleInputEmail1"
                                        class="card-title mb-0"><?= $d->nama_poli; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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