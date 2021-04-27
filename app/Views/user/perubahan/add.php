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
                                    <a href="<?= base_url('/user/dashboard') ?>" class="btn bg-white btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Kembali">
                                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                    </a>
                                </div>
                                <div class="col-8 justify-content-center text-muted text-center mt-1">
                                    <h3>Permintaan Perubahan Data</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-lg-4 py-lg-4 mb-3">
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h4 class="text-white">Periksa Entrian Form</h4>
                                    <hr class="my-3">
                                    <?php echo session()->getFlashdata('error'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <form method="post" action="<?= base_url('user/perubahan/store') ?>" role="form" enctype="multipart/form-data">
                                <?php csrf_field(); ?>
                                <input class="form-control" id="id_perubahan" name="id_perubahan" type="text" hidden>
                                <div class="form-group mb-3">
                                    <label for="nik" class="form-control-label">NIK :</label>
                                    <input class="form-control" id="nik" name="nik" value="<?= old('nik') ?>" placeholder="<?= session()->get('nik') ?>" type="text" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kategori" class="form-control-label">Kategori Perubahan :</label>
                                    <select class="form-control" name="kategori" id="kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="nik" <?= (old('kategori') == 'nik' ? "selected" : ""); ?>>NIK</option>
                                        <option value="nama" <?= (old('kategori') == 'nama' ? "selected" : ""); ?>>Nama</option>
                                        <option value="jenis_kelamin" <?= (old('kategori') == 'jenis_kelamin' ? "selected" : ""); ?>>Jenis Kelamin</option>
                                        <option value="ttl" <?= (old('kategori') == 'ttl' ? "selected" : ""); ?>>TTL</option>
                                        <?php if (session()->get('role') == 'guru' or session()->get('role') == 'pegawai') { ?>
                                            <option value="status_kepegawaian" <?= (old('kategori') == 'status_kepegawaian' ? "selected" : ""); ?>>Status Kepegawaian</option>
                                            <?php if (session()->get('role') == 'guru') { ?>
                                                <option value="jurusan" <?= (old('jurusan') == 'jurusan' ? "selected" : ""); ?>>Jurusan</option>
                                            <?php } else if (session()->get('role') == 'pegawai') { ?>
                                                <option value="kategori" <?= (old('kategori') == 'kategori' ? "selected" : ""); ?>>Kategori</option>
                                            <?php } ?>
                                            <option value="sk_cpns" <?= (old('kategori') == 'sk_cpns' ? "selected" : ""); ?>>SK-CPNS</option>
                                            <option value="nip" <?= (old('kategori') == 'nip' ? "selected" : ""); ?>>NIP</option>
                                            <option value="nuptk" <?= (old('kategori') == 'nuptk' ? "selected" : ""); ?>>NUPTK</option>
                                            <option value="npwp" <?= (old('kategori') == 'npwp' ? "selected" : ""); ?>>NPWP</option>
                                        <?php } else if (session()->get('role') == 'alumni') { ?>
                                            <option value="tahun_lulus" <?= (old('kategori') == 'tahun_lulus' ? "selected" : ""); ?>>Tahun Lulus</option>
                                        <?php } else if (session()->get('role') == 'siswa') { ?>
                                            <option value="nisn" <?= (old('kategori') == 'nisn' ? "selected" : ""); ?>>NISN</option>
                                            <option value="kelas" <?= (old('kategori') == 'kelas' ? "selected" : ""); ?>>Kelas</option>
                                            <option value="no_kip" <?= (old('kategori') == 'no_kip' ? "selected" : ""); ?>>No KIP</option>
                                            <option value="no_rek" <?= (old('kategori') == 'no_rek' ? "selected" : ""); ?>>No Rekening</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="deskripsi">Deskripsi Perubahan :</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Perubahan" required><?= old('deskripsi') ?></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-label" for="berkas">Berkas Bukti (Scan KTP/KK/SK/DLL) : <small class="text-right">Format FIle : jpg, jpeg, png</small></label>
                                    <input type="file" name="berkas" class="form-control" id="berkas">
                                </div>
                                <div class="text-center pt-3">
                                    <button class="btn btn-warning mr-2" type="reset" value="Reset">Reset</button>
                                    <button type="submit" id="submit" class="btn" style="color: white; background-color: #1174EF">Submit</button>
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