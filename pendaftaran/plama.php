<?php require_once "../config/connect.php"; ?>

<?php require_once "../include/header.php"; ?>

<?php
session_start();
$_SESSION['warning'] = "Success";
$_SESSION['msg'] = "";
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
                        <h3 class="text-themecolor">Reservasi Online</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:window.history.go(-1);">Users</a></li>
                            <li class="breadcrumb-item active">Daftar Pasien</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-5">
                        <?php if ($_SESSION['warning'] == "Warning") {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong><?php $_SESSION['msg'] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php } ?>
                        <div class="card" style="border-radius: 7px;">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div>
                                        <h5 class="card-title mb-0">Reservasi Online</h5>
                                    </div>
                                </div><br>
                                <div>
                                    <form name="tambah" method="POST" action="plamaaksi.php">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">No Rekam Medis</label>
                                            <input type="text" class="form-control" name="rekammedis"
                                                aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tanggal" class="form-control" required>
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