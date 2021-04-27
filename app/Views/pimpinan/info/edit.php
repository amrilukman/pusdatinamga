<!-- ============================================================== -->
<!-- Header - File that you can find on __partial/header.php -->
<!-- ============================================================== -->

<?= $this->include('pimpinan/__partial/header') ?>

<!-- ============================================================== -->
<!-- Body -->
<!-- ============================================================== -->

<body>

    <!-- ============================================================== -->
    <!-- Sidebar - File that you can find on __partial/sidebar.php -->
    <!-- ============================================================== -->

    <?= $this->include('pimpinan/__partial/sidebar') ?>

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

        <?= $this->include('pimpinan/__partial/navbar') ?>

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
                                    <a href="<?= base_url('/pimpinan/dashboard') ?>" class="btn bg-white btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Kembali">
                                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                    </a>
                                </div>
                                <div class="col-8 justify-content-center text-muted text-center mt-1">
                                    <h3>Edit Informasi & Pengumuman</h3>
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

                            <form method="post" action="<?= base_url('pimpinan/info/update/' . $info->id_info . '') ?>" role="form">
                                <?php csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <label for="judul_info" class="form-control-label">Judul Informasi :</label>
                                    <input class="form-control" id="judul_info" name="judul_info" value="<?= $info->judul_info ?>" type="text" placeholder="Judul Informasi" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi" required><?= $info->deskripsi_info ?></textarea>
                                </div>
                                <div class="form-group mb-3 my-0">
                                    <label for="link_info" class="form-control-label">Link :</label>
                                    <input type="text" class="form-control" name="link_info" value="<?= $info->link_info ?>" required onblur="checkURL(this)">
                                </div>
                                <script>
                                    function checkURL(abc) {
                                        var string = abc.value;
                                        if (!~string.indexOf("http")) {
                                            string = "http://" + string;
                                        }
                                        abc.value = string;
                                        return abc
                                    }
                                </script>
                                <div class="text-center pt-3">
                                    <button class="btn btn-warning mr-2" type="reset" value="Reset">Reset</button>
                                    <button type="submit" id="submit" class="btn" style="color: white; background-color: #1174EF">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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

        <?= $this->include('pimpinan/__partial/footer') ?>

        <!-- ============================================================== -->
        <!-- End of Footer - File that you can find on __partial/footer.php -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->

    <?= $this->include('pimpinan/__partial/modal') ?>

    <!-- ============================================================== -->
    <!-- End of Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

    <?= $this->include('pimpinan/__partial/js.php') ?>

    <!-- ============================================================== -->
    <!-- End of jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

</body>

</html>