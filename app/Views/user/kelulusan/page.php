<!-- ============================================================== -->
<!-- Header - File that you can find on __partial/header.php -->
<!-- ============================================================== -->

<?= $this->include('user/__partial/header') ?>

<!-- ============================================================== -->
<!-- Body -->
<!-- ============================================================== -->

<body>

    <!-- ============================================================== -->
    <!-- Sidebar - File that you can find on __partial/sidebar.php -->
    <!-- ============================================================== -->

    <?= $this->include('user/__partial/sidebar') ?>

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

        <?= $this->include('user/__partial/navbar') ?>

        <!-- ============================================================== -->
        <!-- End of Navbar - File that you can find on __partial/navbar.php -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Header -->
        <!-- ============================================================== -->
        <div class="header bg-gradient-info pb-6">
            <div class="container-fluid">
                <div class="header-body">
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
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-white border-0">
                        <div class="card-header bg-transparent pb-3">
                            <div class="text-muted text-center mt-1">
                                <h3>Informasi Kelulusan</h3>
                            </div>
                        </div>
                        <div class="card-body mb-3">
                            <div class="mb-4 text-center">
                                <h3 class="mb-0"><?= $data->nama_siswa ?></h3>
                                <small class="text-sm text-muted mb-0"><?= $data->nisn ?></small>
                            </div>
                            <div class="mb-3 text-center">
                                <?php if ($data->status == 'Lulus') { ?>
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow mb-2" style="height:70px; width:70px">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                <?php } else if ($data->status == 'Tidak Lulus') { ?>
                                    <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow mb-2" style="height:70px; width:70px">
                                        <i class="fas fa-frown"></i>
                                    </div>
                                <?php } ?>
                                <h2 class="text-uppercase ls-0 mt-4"><?= $data->status ?></h2>
                            </div>
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

        <?= $this->include('user/__partial/footer') ?>

        <!-- ============================================================== -->
        <!-- End of Footer - File that you can find on __partial/footer.php -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->

    <?= $this->include('user/__partial/modal') ?>

    <!-- ============================================================== -->
    <!-- End of Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

    <?= $this->include('user/__partial/js.php') ?>

    <!-- ============================================================== -->
    <!-- End of jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

</body>

</html>