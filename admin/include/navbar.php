<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <div class="navbar-header">
        <a class="navbar-brand" href="../index.php">
            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
            </b><span>
                <img src="../assets/images/logo-baru.png" alt="homepage" class="dark-logo" />
        </a>
    </div>
    <div class="navbar-collapse">
        <ul class="navbar-nav me-auto">
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                    href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
            <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark"
                    href="javascript:void(0)"><i class="fa fa-search"></i></a>
                <form class="app-search">
                    <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i
                            class="fa fa-times"></i></a>
                </form>
            </li>
        </ul>
        <ul class="navbar-nav my-lg-0">
            <div class="nav-item dropdown u-pro">
                <a class="nav-link dropdown-content waves-effect waves-dark profile-pic" href="#" id="navbarDropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                        src="../assets/images/users/pasfoto.png" alt="user" class="" /> <span
                        class="hidden-md-down"><?php echo $_SESSION['username']; ?> &nbsp;</span> </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../login/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </ul>
    </div>
</nav>