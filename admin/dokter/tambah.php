<?php require_once "../../config/connect.php"; ?>

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
                        <h3 class="text-themecolor">Dokter</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:window.history.go(-1);">Dokter</a></li>
                            <li class="breadcrumb-item active">Tambah Data</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div>
                                        <h5 class="card-title mb-0">Tambah Data Dokter</h5>
                                    </div>
                                </div><br>
                                <div>
                                    <form name="tambah" method="POST" action="tambahaksi.php">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_dokter" onkeypress="InputWord(event)" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Poli</label>
                                            <select name="id_poli" class="form-control">
                                                <option value="no subject">Pilih Poli</option>
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
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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