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
                        <h3 class="text-themecolor">Poli</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:window.history.go(-1);">Poli</a></li>
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
                                        <h5 class="card-title mb-0">Edit Data Poli</h5>
                                    </div>
                                </div><br>
                                <div>
                                    <?php
                                    $id = $_GET['id_poli'];
                                    $poli = mysqli_query($conn, "select * from poli where id_poli='$id'");
                                    while ($p = mysqli_fetch_array($poli)) {
                                    ?>
                                        <form name="update" method="POST" action="editaksi.php">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama Poli</label>
                                                <input type="hidden" name="id" value="<?php echo $p['id_poli']; ?>">
                                                <input type="text" class="form-control" name="nama_poli" value="<?php echo $p['nama_poli']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
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