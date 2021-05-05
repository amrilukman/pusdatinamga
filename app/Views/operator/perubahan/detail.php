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
                                    <a href="<?= base_url('/operator/dashboard') ?>" class="btn bg-white btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Kembali">
                                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                    </a>
                                </div>
                                <div class="col-8 justify-content-center text-muted text-center mt-1">
                                    <h3>Permintaan Perubahan Data</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-lg-3 py-lg-3 mb-1">
                            <div class="list-group list-group-flush ml-3 mt-1">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-sm">NIK</h4>
                                        </div>
                                        <p class="text-sm mb-0"><?= $data->nik ?></p>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-sm">Nama</h4>
                                        </div>
                                        <p class="text-sm mb-0"><?= $data->nama ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush ml-3 mt-1 mb-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-sm">Kategori Perubahan</h4>
                                        </div>
                                        <p class="text-sm mb-0"><?= strtoupper($data->kategori_perubahan) ?></p>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-sm">Deskripsi Perubahan</h4>
                                        </div>
                                        <p class="text-sm mb-0"><?= $data->deskripsi_perubahan ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <a class="btn btn-success" style="color: white; background-color: #1174EF" href="<?= base_url('operator/perubahan/download/' . $data->id_perubahan . '') ?>">Download Berkas</a>
                            </div>
                            <div class="row">
                                <div class="col-3 text-left">
                                    <div class="mb-0 mt-4 ml-0">
                                        <a href="<?= base_url('operator/perubahan/edit/' . $data->id_perubahan . '') ?>" class="btn btn-warning">
                                            <div class="media align-items-center">
                                                <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                                                <div class="media-body ml-0 d-none d-lg-block">
                                                    <span class="pl-2 btn-inner--text">Edit</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col text-right mb-0 mt-4">
                                    <a onclick="deleteConfirm('<?= base_url('operator/perubahan/reject/' . $data->id_perubahan . ''); ?>')" href="#!" class="btn btn-danger">Reject</a>
                                    <a onclick="deleteConfirm('<?= base_url('operator/perubahan/approve/' . $data->id_perubahan . ''); ?>')" href="#!" class="btn btn-success">Approve</a>
                                </div>
                            </div>
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

        <?= $this->include('operator/__partial/footer') ?>

        <!-- ============================================================== -->
        <!-- End of Footer - File that you can find on __partial/footer.php -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->


    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#selesaiModal').modal();
        }
    </script>

    <!--Modal Notification -->
    <div class="modal fade show" id="selesaiModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-warning">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Peringatan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="fas fa-exclamation-circle ni-3x"></i>
                        <h4 class="heading mt-4">ANDA YAKIN SUDAH EDIT DATA INI ?</h4>
                    </div>
                </div>
                <div class="modal-footer pb-0">
                    <a href="<?= base_url('operator/perubahan/edit/' . $data->id_perubahan . '') ?>" class="btn btn-white">Edit Data</a>
                    <a id="btn-delete" true type="button" href="#" class="btn btn-link text-white ml-auto">Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>

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