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
                        <h3 class="text-themecolor">User</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:window.history.go(-1);">Users</a></li>
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
                                        <h5 class="card-title mb-0">Tambah Data User</h5>
                                    </div>
                                </div><br>
                                <div>
                                    <form name="tambah" method="POST" action="tambahaksi.php">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">NIK</label>
                                            <input type="number" class="form-control" name="nik" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" aria-describedby="emailHelp" onkeypress="InputWord(event)">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                            <input type="text" name="tempatlahir" class="form-control" onkeypress="InputWord(event)">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control">
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