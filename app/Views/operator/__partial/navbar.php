<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-info border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark d-xl-none" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </div>
            <!-- Default password alert -->
            <?php if (session()->get('password') == md5('12345678') and current_url() == base_url('operator/dashboard')) : ?>
                <div class="alert alert-danger inline alert-dismissible fade show mb-0 mt-0" role="alert">
                    <div class="row">
                        <div class="col-8 pr-0">
                            <span class="alert-text">Anda masih menggunakan default password!</span>
                        </div>
                        <div class="col-4 my-auto pr-0">
                            <a href="<?= base_url('operator/profil/resetpassword/' . $user->nik . '') ?>" class="btn btn-secondary btn-sm mr-0" type="button">
                                <span class="btn-inner--text">Ganti Password</span>
                            </a>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show mb-0 mt-0" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
            <!-- Navbar links -->
            <ul class="navbar-nav justify-content-between ml-md-auto">
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="<?= base_url('../assets/img/theme/user.png') ?>">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?= session()->get('nama'); ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="<?= base_url('operator/profil') ?>" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('login/logout') ?>" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>