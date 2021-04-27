<!-- ============================================================== -->
<!-- Header - File that you can find on __partial/header.php -->
<!-- ============================================================== -->

<?= $this->include('operator/__partial/header') ?>

<!-- ============================================================== -->
<!-- Body -->
<!-- ============================================================== -->

<body>

    <!-- ============================================================== -->
    <!-- Sidebar - File that you can find on __partial/sidebar.php -->
    <!-- ============================================================== -->

    <?= $this->include('operator/__partial/sidebar') ?>

    <!-- ============================================================== -->
    <!-- End of Sidebar - File that you can find on __partial/sidebar.php -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Main Content -->
    <!-- ============================================================== -->
    <div class="main-content" id="panel">

        <!-- ============================================================== -->
        <!-- Navbarr - File that you can find on __partial/navbar.php -->
        <!-- ============================================================== -->

        <?= $this->include('operator/__partial/navbar') ?>

        <!-- ============================================================== -->
        <!-- End of Navbar - File that you can find on __partial/navbar.php -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Header -->
        <!-- ============================================================== -->
        <div class="header bg-gradient-info pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End of header -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div class="container-fluid mt--6">
            <!-- ============================================================== -->
            <!-- Form Reset Password -->
            <!-- ============================================================== -->
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card bg-white border-0">
                        <div class="card-header bg-transparent pb-3">
                            <div class="row">
                                <div class="col-2">
                                    <a href="<?= base_url('/operator/user/list') ?>" class="btn bg-white btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Kembali">
                                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                    </a>
                                </div>
                                <div class="col-8 justify-content-center text-muted text-center mt-1">
                                    <h3>Edit Role</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-lg-4 py-lg-4 mb-3">
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('error'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>

                            <form method="post" action="<?= base_url('operator/user/update/' . $user->nik . '') ?>" role="form">
                                <?php csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <label for="nik" class="form-control-label">NIK :</label>
                                    <input class="form-control" id="nik" name="nik" value="<?= $user->nik ?>" type="text" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nama" class="form-control-label">Nama :</label>
                                    <input class="form-control" id="nama" name="nama" placeholder="Nama" type="text" value="<?= $user->nama ?>" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="role" class="form-control-label">Role :</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="">Pilih Role</option>
                                        <option id="role1" value="operator" <?= ($user->role == 'operator' ? "selected" : ""); ?>>Operator</option>
                                        <option id="role2" value="pimpinan" <?= ($user->role == 'pimpinan' ? "selected" : ""); ?>>Pimpinan</option>
                                        <option id="role3" value="user" <?= ($user->role == 'pegawai' ? "selected" : ""); ?> <?= ($user->role == 'guru' ? "selected" : ""); ?>>User</option>
                                    </select>
                                </div>
                                <div class="text-center pt-3">
                                    <button type="submit" id="submit" class="btn" style="color: white; background-color: #1174EF">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End of Form Reset Password -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End of Page Content -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Footer - File that you can find on __partial/footer.php -->
        <!-- ============================================================== -->

        <?= $this->include('operator/__partial/footer') ?>

        <!-- ============================================================== -->
        <!-- End of Footer - File that you can find on __partial/footer.php -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->

    <?= $this->include('operator/__partial/modal') ?>

    <!-- ============================================================== -->
    <!-- End of Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

    <?= $this->include('operator/__partial/js.php') ?>

    <!-- ============================================================== -->
    <!-- End of jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

</body>

</html>