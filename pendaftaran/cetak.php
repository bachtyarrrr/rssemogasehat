<?php require_once "../config/connect.php"; ?>
<?php require_once "../include/header.php"; ?>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login/index.php?pesan=belum_login");
}
?>

<body class="fix-header fix-sidebar card-no-border">
    <div class="row">
        <!-- sini -->
        <?php
        $id = $_SESSION['rekammedis'];
        $id_u = $_SESSION['id'];
        $pendaftar = mysqli_query($conn, "SELECT a.*, b.nama, b.id_user, c.nama_poli 
                    FROM pendaftar as a inner join pasien as b on a.id_pasien = b.rekammedis 
                    inner join poli as c on a.id_poli = c.id_poli WHERE b.id_user = $id_u AND id_pasien = '$id' order by a.kode_pendaftaran asc");

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
                    <div><br>
                        <div>
                            <label for="exampleInputEmail1" class="card-title mb-0">Kode
                                Pendaftaran :
                                <?= $p->kode_pendaftaran ?></label>
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="card-title mb-0">Nomor kartu :
                                <?= $p->id_pasien ?></label>
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="card-title mb-0">Nama
                                Pasien : <span class="text-uppercase"><?= $p->nama ?></span>
                            </label>
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="card-title mb-0">Tanggal Periksa :
                                <?php echo $daftar_hari[$namahari]; ?>,
                                <?= date_format($tanggal, "d F Y"); ?></label>
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="card-title mb-0">Poli Tujuan :
                                <span class="text-uppercase"><?= $p->nama_poli ?></span></label>
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="card-title mb-0">Nomor Antrian :
                                <?= $p->nomor_antrian ?></label>
                        </div>
                    </div>
                    <div>
                        <img src="<?= $p->qrcode ?>" id="generatedQrImg" class="center">
                    </div><br>
                    <div>
                        <h7 style="font-weight-bold: 700;"> - Harap Dibawa Saat Berobat -</h7>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php require_once "../include/script.php"; ?>
    <!-- <script>
    window.print();
    </script> -->
</body>