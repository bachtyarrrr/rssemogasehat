<?php
require_once "../config/connect.php";
require_once "../include/header.php";

session_start();
if ($_SESSION['status'] != "login") {
    header("location:login/index.php?pesan=belum_login");
}

$daftar = mysqli_query($conn, "SELECT a.*, b.rekammedis, b.nama, b.id_user, c.nama_poli 
                                            FROM pendaftar as a inner join pasien as b on a.id_pasien = b.rekammedis 
                                            inner join poli as c on a.id_poli = c.id_poli order by a.kode_pendaftaran AND a.tanggal_periksa
                                            AND a.nomor_antrian asc");
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
                        <h3 class="text-themecolor">Data Pasien Pendaftar</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Pendaftar Online</li>
                        </ol>
                    </div>
                </div>
                <!-- Start Page Content -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Pasien Pendaftar</h4>
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>Kode Daftar</th>
                                                <th>No Rekam Medis</th>
                                                <th>Nama Pasien</th>
                                                <th>Tanggal Periksa</th>
                                                <th>Poli Tujuan</th>
                                                <th>No Antrian</th>
                                                <th>QR Code</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($d = mysqli_fetch_object($daftar)) {
                                                $tanggal = date_create($d->tanggal_periksa);
                                            ?>
                                            <tr>
                                                <td><?= $d->kode_pendaftaran; ?></td>
                                                <td><?= $d->rekammedis; ?></td>
                                                <td title="<?= $d->nama; ?>"><?= substr($d->nama, 0, 11); ?></td>
                                                <td><?= date_format($tanggal, "d-m-Y"); ?></td>
                                                <td><?= $d->nama_poli; ?></td>
                                                <td><?= $d->nomor_antrian; ?></td>
                                                <td title="<?= $d->qrcode; ?>"><?= substr($d->qrcode, 0, 11); ?></td>
                                                <td>
                                                    <div>
                                                        <a
                                                            href="edit.php?kode_pendaftaran=<?= $d->kode_pendaftaran; ?>">
                                                            <button class="btn btn-success">Edit</button>
                                                        </a>
                                                        <a
                                                            href="hapus.php?kode_pendaftaran=<?= $d->kode_pendaftaran; ?>">
                                                            <button class="btn btn-danger">Hapus</button>
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