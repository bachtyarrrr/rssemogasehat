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
                        <h3 class="text-themecolor">Daftar Data Poli</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Poli</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- sini -->
                    <?php
                    $poli = mysqli_query($conn, "SELECT * FROM poli order by id_poli");
                    while ($p = mysqli_fetch_object($poli)) {
                    ?>
                    <div class="col-lg-4 text-center">
                        <div class="card" style="border-radius: 7px;">
                            <div class="card-body">
                                <a></a>
                                <label for="exampleInputEmail1" class="card-title mb-0"><?= $p->nama_poli; ?></label>
                                <input type="hidden" name="id" value="<?= $p->id_poli; ?>">
                                </a>
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