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
                            <li class="breadcrumb-item active">Edit Data</li>
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
                                        <h5 class="card-title mb-0">Edit Data Dokter</h5>
                                    </div>
                                </div><br>
                                <div>
                                    <?php
                                    include '../config/connect.php';
                                    $id_dokter = $_GET['id_dokter'];
                                    $dokter = mysqli_query($conn, "SELECT * FROM dokter AS d INNER JOIN poli 
                                        AS p ON d.id_poli = p.id_poli WHERE id_dokter='$id_dokter'");
                                    while ($d = mysqli_fetch_array($dokter)) {
                                    ?>
                                    <form name="update" method="POST" action="editaksi.php">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                            <input type="hidden" name="id_dokter"
                                                value="<?php echo $d['id_dokter']; ?>">
                                            <input type="text" class="form-control" name="nama_dokter"
                                                value="<?php echo $d['nama_dokter']; ?>" onkeypress="InputWord(event)"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Poli : </label>
                                            <input type="text" class="form-control" readonly
                                                value="<?php echo $d['nama_poli']; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    <?php } ?>
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