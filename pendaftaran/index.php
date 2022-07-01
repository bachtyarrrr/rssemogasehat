<?php require_once "../config/connect.php"; ?>

<?php require_once "../include/header.php"; ?>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login/index.php?pesan=belum_login");
}
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
                        <h3 class="text-themecolor">Pasien</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Pasien</li>
                        </ol>
                    </div>
                </div>
                <!-- Start Page Content -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card" style="border-radius: 7px;">
                            <div class="card-body">
                                <h4 class="card-title">Data Pasien</h4>
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>No Rekam Medis</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>No Telpon</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pasien = mysqli_query($conn, "SELECT * FROM pasien where id_user=$_SESSION[id]");
                                            while ($ps = mysqli_fetch_object($pasien)) {
                                                $tanggal = date_create($ps->tanggal);
                                            ?>
                                            <tr>
                                                <td><?= $ps->rekammedis; ?></td>
                                                <td><?= $ps->nik; ?></td>
                                                <td title="<?= $ps->nama; ?>"><?= substr($ps->nama, 0, 11); ?></td>
                                                <td><?= $ps->tempatlahir; ?>, <?= date_format($tanggal, "d-m-Y"); ?>
                                                </td>
                                                <td><?= $ps->notelp; ?></td>
                                                <td><?= $ps->alamat; ?></td>
                                                <td>
                                                    <div>
                                                        <a href="plama.php">
                                                            <button class="btn btn-success">Reservasi</button>
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