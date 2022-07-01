<!doctype html>
<html lang="en">

<?php require_once "include/header.php"; ?>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <?php
						if (isset($_GET['pesan'])) {
							if ($_GET['pesan'] == "gagal") {
								echo '<p class="error" style="text-align: center;">username dan password salah!</p>';
							} else if ($_GET['pesan'] == "logout") {
								echo '<p class="error" style="text-align: center;">berhasil logout</p>';
							} else if ($_GET['pesan'] == "belum_login") {
								echo '<p class="error" style="text-align: center;">harus login terlebih dahulu</p>';
							}
						}
						?>
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="../assets/images/logo.png" alt="homepage" class="dark-logo" />
                        </div>
                        <h3 class="text-center mb-4" style="color: #20AEE3;">Selamat datang</h3>

                        <form name="form1" action="ceklogin.php" method="POST" class="login-form">
                            <div class="form-group">
                                <input type="text" name="username" placeholder="Masukkan Username"
                                    class="form-control rounded-left" placeholder="Nama" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" placeholder="Masukkan Password"
                                    class="form-control rounded-left" placeholder="Password" required>
                            </div>
                            <a class="mb-3" href="signup.php">
                                <label for="exampleInputEmail1" class="form-label">Belum punya akun? Daftar</label>
                            </a>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-secondary rounded submit p-3 px-5"
                                    style=" background-color: #20AEE3; border: #20AEE3;">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "include/script.php"; ?>

</body>

</html>