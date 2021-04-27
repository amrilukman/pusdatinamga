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
                        <div class="col-lg-6 col-7">
                            <a href="<?= base_url('/operator/pegawai/list') ?>" class="btn bg-white btn-icon">
                                <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                <span class="btn-inner--text">Kembali</span>
                            </a>
                        </div>
                        <div class="col text-right">
                            <h6 class="h2 text-white d-inline-block mb-0">Form Data Pegawai</h6>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Rangkuman data -->
                    <!-- ============================================================== -->
                    <div class="row">

                    </div>
                    <!-- ============================================================== -->
                    <!-- End of Rangkuman data -->
                    <!-- ============================================================== -->
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
            <!-- Form Edit Pegawai -->
            <!-- ============================================================== -->
            <div class="card bg-white border-0 mb-0">
                <div class="card-header bg-transparent">
                    <div>
                        <h3 class="mb-0 text-dark">Edit Data Pegawai</h3>
                    </div>
                </div>
                <div class="card-body bg-white border-0">
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
                    <form method="post" action="<?= base_url('operator/pegawai/update/' . $pegawai->nik . '') ?>">
                        <?= csrf_field(); ?>
                        <h6 class="heading-small text-muted mb-3">User Information</h6>
                        <div class="ml-3">
                            <div class="form-row my-0">
                                <div class="form-group col-4">
                                    <label for="nik" class="form-control-label">NIK : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="numeric" name="nik" id="nik" placeholder="NIK" value="<?= $pegawai->nik ?>" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="nama" class="form-control-label">Nama : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama" value="<?= $pegawai->nama_pegawai ?>" required>
                                </div>
                            </div>
                            <div class="form-row my-0">
                                <div class="form-group col-4">
                                    <label for="tempat_lahir" class="form-control-label">Tempat Lahir : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= $pegawai->tempat_lahir ?>" required>
                                </div>
                                <script>
                                    $(function() {
                                        var dtToday = new Date();

                                        var month = dtToday.getMonth() + 1;
                                        var day = dtToday.getDate();
                                        var year = dtToday.getFullYear();
                                        if (month < 10)
                                            month = '0' + month.toString();
                                        if (day < 10)
                                            day = '0' + day.toString();

                                        var maxDate = year + '-' + month + '-' + day;

                                        $('#tanggal_lahir').attr('max', maxDate);
                                    });
                                </script>
                                <div class="form-group col-4">
                                    <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $pegawai->tanggal_lahir ?>" required>
                                    <small><span id='message'></span><small>
                                </div>
                            </div>
                            <div class="form-group mb-3 my-0" required>
                                <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin : <span class="text-danger">*</span></label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="lakilaki" name="jenis_kelamin" class="custom-control-input" value="L" <?= ($pegawai->jenis_kelamin == "L" ? "checked" : ""); ?>>
                                    <label class="custom-control-label" for="lakilaki">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input" value="P" <?= ($pegawai->jenis_kelamin == "P" ? "checked" : ""); ?>>
                                    <label class="custom-control-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-row mb-3 my-0">
                                <div class="form-group col-4">
                                    <label for="kecamatan" class="form-control-label">Kecamatan : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?= $pegawai->kecamatan ?>" required>
                                </div>
                                <div class="form-group col-8">
                                    <label class="form-control-label" for="alamat">Alamat Lengkap : <small>(Nama Jalan, RT/RW, Desa/Kelurahan, Kode Post)</small> <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3" required maxlength=100><?= $pegawai->alamat ?></textarea>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-3">User Contact</h6>
                        <div class="ml-3">
                            <div class="form-row mb-3 my-0">
                                <div class="form-group col-4">
                                    <label for="email" class="form-control-label">Email : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?= $pegawai->email_pegawai ?>" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="no_hp" class="form-control-label">No Telepon : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="numeric" name="no_hp" id="no_hp" placeholder="No Telepon/Whatsapp" value="<?= $pegawai->no_hp ?>" required>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-3">Kepegawaian</h6>
                        <div class="ml-3">
                            <div class="form-row my-0">
                                <div class="form-group mb-0 my-0 col-4" required>
                                    <label for="status" class="form-control-label">Status Kepegawaian : <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio mb-3 mt-2 pl-0">
                                        <input type="radio" id="status" name="status" value="PNS" onchange="showhideForm(this.value);" <?= ($pegawai->status_kepegawaian == "PNS" ? "checked" : ""); ?>>
                                        <label class="text-sm ml-2 mr-3" for="status">PNS</label>
                                        <input type="radio" id="status" name="status" value="Non-PNS" onchange="showhideForm(this.value);" <?= ($pegawai->status_kepegawaian == "Non-PNS" ? "checked" : ""); ?>>
                                        <label class="text-sm ml-2" for="status">Non-PNS</label>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    function showhideForm(status) {
                                        if (status == "PNS") {
                                            document.getElementById("sk_cpns").required = true;
                                            document.getElementById("sk_cpns").disabled = false;
                                            document.getElementById("nip").required = true;
                                            document.getElementById("nip").disabled = false;
                                        }
                                        if (status == "Non-PNS") {
                                            document.getElementById("sk_cpns").required = false;
                                            document.getElementById("sk_cpns").disabled = true;
                                            document.getElementById("sk_cpns").value = null;
                                            document.getElementById("nip").required = false;
                                            document.getElementById("nip").disabled = true;
                                            document.getElementById("nip").value = null;
                                        }
                                    }
                                </script>
                                <div id="div1" class="form-group col-4 mb-0" style="display: block" required>
                                    <label for="sk_cpns" class="form-control-label">SK-CPNS : <span class="text-danger">**</span></label>
                                    <input class="form-control" type="text" id="sk_cpns" name="sk_cpns" placeholder="SK-CPNS" value="<?= $pegawai->sk_cpns ?>" required <?= ($pegawai->status_kepegawaian == "Non-PNS" ? "disabled" : ""); ?>>
                                </div>
                                <div class="form-group col-4">
                                    <label for="nip" class="form-control-label">NIP : <span class="text-danger">**</span></label>
                                    <input class="form-control" type="numeric" name="nip" id="nip" placeholder="NIP" value="<?= $pegawai->nip ?>" <?= ($pegawai->status_kepegawaian == "Non-PNS" ? "disabled" : ""); ?>>
                                </div>
                            </div>
                            <div class="form-row my-0">
                                <div class="form-group col-4 mb-0">
                                    <label for="sk_pengangkatan" class="form-control-label">SK-Pengangkatan : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="sk_pengangkatan" name="sk_pengangkatan" placeholder="SK-Pengangkatan" value="<?= $pegawai->sk_pengangkatan ?>" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="nuptk" class="form-control-label">NUPTK :</label>
                                    <input class="form-control" type="numeric" name="nuptk" id="nuptk" placeholder="NUPTK" value="<?= $pegawai->nuptk ?>">
                                </div>
                                <div class="form-group col-4">
                                    <label for="npwp" class="form-control-label">NPWP :</label>
                                    <input class="form-control" type="numeric" name="npwp" id="npwp" placeholder="NPWP" value="<?= $pegawai->npwp ?>">
                                </div>
                            </div>
                            <div class="form-row mb-3 my-0">
                                <div class="form-group col-4">
                                    <label for="kategori" class="form-control-label">Kategori : <span class="text-danger">*</span></label>
                                    <select class="form-control" name="kategori" id="kategori" required>
                                        <option value="">Pilih kategori</option>
                                        <?php foreach ($kategori as $key => $data) { ?>
                                            <option value="<?= $data->id_kategori; ?>" <?= ($pegawai->kategori == $data->id_kategori ? "selected" : ""); ?>><?= $data->nama_kategori; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-right">
                                <input class="btn btn-warning mr-2" type="reset" value="Reset">
                                <input class="btn" type="submit" value="Update" style="color: white; background-color: #1174EF">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End of Form Edit Pegawai -->
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