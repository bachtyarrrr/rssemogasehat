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
                    <div class="col-md-6 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:window.history.go(-1);">Pasien
                                    Lama</a></li>
                            <li class="breadcrumb-item">Konfirmasi Data Pasien</li>
                            <li class="breadcrumb-item active">Bukti Pendaftaran</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $id_u = $_SESSION['id'];
                    $pendaftar = mysqli_query($conn, "SELECT a.*, b.nama, b.id_user, c.nama_poli 
                    FROM pendaftar as a inner join pasien as b on a.id_pasien = b.rekammedis 
                    inner join poli as c on a.id_poli = c.id_poli WHERE b.id_user = $id_u order by a.kode_pendaftaran asc");

                    while ($p = mysqli_fetch_object($pendaftar)) {

                        $tanggal = date_create($p->tanggal_periksa);
                        $daftar_hari = array(
                            'Sunday' => 'Minggu',
                            'Monday' => 'Senin',
                            'Tuesday' => 'Selasa',
                            'Wednesday' => 'Rabu',
                            'Thursday' => 'Kamis',
                            'Friday' => 'Jumat',
                            'Saturday' => 'Sabtu'
                        );
                        $tgl = $p->tanggal_periksa;
                        $namahari = date('l', strtotime($tgl));
                    ?>
                    <div class="col-lg-5">
                        <div class="card" style="border-radius: 7px;">
                            <div class="card-body text-center">
                                <h4>Bukti Pendaftaran Online</h4>
                                <div style="background-color: #00b353; color: white; border-radius: 7px;">
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">Kode
                                            Pendaftaran :
                                            <?= $p->kode_pendaftaran ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">Nomor kartu :
                                            <?= $p->id_pasien ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">Nama Pasien :
                                            <?= $p->nama ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">Tanggal Periksa :
                                            <?php echo $daftar_hari[$namahari]; ?>,
                                            <?= date_format($tanggal, "d-m-Y"); ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">Poli Tujuan :
                                            <?= $p->nama_poli ?></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <label for="exampleInputEmail1" class="card-title mb-0">Nomor Antrian :
                                            <?= $p->nomor_antrian ?></label>
                                    </div>
                                    <hr>
                                </div>
                                <div>
                                    <img src="<?= $p->qrcode ?>" id="generatedQrImg" class="center">
                                </div><br>
                                <div>
                                    <h7 class="bold">- Harap Dibawa Saat Berobat -</h7>
                                </div><br>
                                <div><a href="cetak.php"
                                        onClick="MyWindow=window.open('cetak.php', 'MyWindow', 'width=400,height=500'); return false;">
                                        <button class="btn btn-danger">Cetak</button>
                                    </a>
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