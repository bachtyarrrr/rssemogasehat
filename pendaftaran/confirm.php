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
                        <h3 class="text-themecolor">Konfirmasi Data</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:window.history.go(-1);">Daftar Pasien
                                    Lama</a></li>
                            <li class="breadcrumb-item active">Data Pasien</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- sini -->
                    <?php
                    $id = $_SESSION['rekammedis'];
                    $pendaftar = mysqli_query($conn, "SELECT * from pasien where rekammedis ='$id' ");
                    while ($p = mysqli_fetch_object($pendaftar)) {
                        $tanggal = date_create($p->tanggal);

                        $format = 'Y-m-d';
                        $PD = 0;

                        $FD = 14;

                        $PDT = date($format, strtotime(" -$PD days"));
                        $FDT = date($format, strtotime(" +$FD days"))
                    ?>
                    <div class="col-lg-5">

                        <div class="row">
                            <div class="col-md-12">
                                <?php if ($_SESSION['warning'] == "Warning") {
                                    ?>
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    <strong><?php echo $_SESSION['msg'] ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="card" style="border-radius: 7px;">
                            <form name="tambah" action="confirmaksi.php" method="post">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="../assets/images/dokter.png" alt="homepage" class="dark-logo"
                                            style="width: 70px;" />
                                    </div><br>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">No Rekam Medis :
                                            <?= $p->rekammedis; ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">NIK :
                                            <?= $p->nik; ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">Nama Pasien :
                                            <?= $p->nama; ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">Tempat, Tanggal Lahir :
                                            <?= $p->tempatlahir; ?>, <?= date_format($tanggal, "d F Y"); ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">No Telepon :
                                            <?= $p->notelp; ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">Alamat :
                                            <?= $p->alamat; ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="form-label">Poli</label>
                                        <select name="id_poli" class="form-control" required>
                                            <option value="" selected>Pilih Poli Tujuan</option>
                                            <?php
                                                $sql = mysqli_query($conn, "SELECT * FROM poli");
                                                while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                            <option value="<?= $data['id_poli'] ?>"><?= $data['nama_poli'] ?></option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputPassword1" class="form-label">Tanggal periksa</label>
                                        <input type="date" min="<?= $PDT; ?>" name="tanggal_periksa" max="<?= $FDT; ?>"
                                            class="form-control" required>
                                    </div>
                                    <hr>
                                    <a class=" btn btn-danger" href="javascript:window.history.go(-1);">Batal</a>
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                </div>
                            </form>
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