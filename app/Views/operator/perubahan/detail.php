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
                        <div class="card-body px-lg-4 py-lg-1 mb-3">
                            <div class="ml-3 mt-4">
                                <div class="list-group list-group-flush ml-2 mt-1 mb-3">
                                    <div class="row align-items-center">
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">NIK</h4>
                                            </div>
                                            <p class="text-sm mb-0"><?= $data->nik ?></p>
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">Nama</h4>
                                            </div>
                                            <p class="text-sm mb-0"><?= $data->nama ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush ml-2 mt-1 mb-4">
                                    <div class="row align-items-center">
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">Kategori Perubahan</h4>
                                            </div>
                                            <p class="text-sm mb-0"><?= strtoupper($data->kategori_perubahan) ?></p>
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">Deskripsi Perubahan</h4>
                                            </div>
                                            <p class="text-sm mb-0"><?= $data->deskripsi_perubahan ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <a class="btn btn-success mr-2" href="<?= base_url('operator/perubahan/download/' . $data->id_perubahan . '') ?>">Download Berkas</a>
                            </div>
                            <div class="text-right mb-0">
                                <a onclick="deleteConfirm('<?= base_url('operator/perubahan/selesai/' . $data->id_perubahan . ''); ?>')" href="#1" class="btn" style="color: white; background-color: #1174EF">Selesai</a>
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
                        <i class="far fa-trash-alt ni-3x"></i>
                        <h4 class="heading mt-4">Notifikasi Akan Dihapus</h4>
                        <p>Anda yakin sudah mengubah data ini ?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Kembali</button>
                    <a id="btn-delete" true type="button" href="#" class="btn btn-link text-white ml-auto">Hapus</button>
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