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
                            <a href="<?= base_url('/operator/siswa/list') ?>" class="btn bg-white btn-icon">
                                <div class="media align-items-center">
                                    <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                    <div class="media-body ml-0 d-none d-lg-block">
                                        <span class="pl-2 btn-inner--text">Kembali</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col text-right">
                            <h6 class="h2 text-white d-inline-block mb-0">Form Data Siswa</h6>
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
            <!-- Data Jurusan -->
            <!-- ============================================================== -->
            <div class="card bg-white border-0 mb-0">
                <div class="card-header bg-transparent">
                    <div>
                        <h3 class="mb-0 text-dark">Tambah Data Siswa</h3>
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
                    <form method="post" action="<?= base_url('operator/siswa/store') ?>">
                        <?= csrf_field(); ?>
                        <h6 class="heading-small text-muted mb-3">User Information</h6>
                        <div class="ml-3">
                            <div class="form-row my-0">
                                <div class="form-group col-lg-4">
                                    <label for="nik" class="form-control-label">NIK : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="numeric" name="nik" id="nik" placeholder="NIK" value="<?= old('nik'); ?>" required>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="nama" class="form-control-label">Nama : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama" value="<?= old('nama'); ?>" required>
                                </div>
                            </div>
                            <div class="form-row my-0">
                                <div class="form-group col-lg-4">
                                    <label for="tempat_lahir" class="form-control-label">Tempat Lahir : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= old('tempat_lahir'); ?>" required>
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
                                <div class="form-group col-lg-4">
                                    <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>" required>
                                    <small><span id='message'></span><small>
                                </div>
                            </div>
                            <div class="form-group mb-3 my-0" required>
                                <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin : <span class="text-danger">*</span></label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="lakilaki" name="jenis_kelamin" class="custom-control-input" value="L" <?= (old("jenis_kelamin") == "L" ? "checked" : ""); ?>>
                                    <label class="custom-control-label" for="lakilaki">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input" value="P" <?= (old("jenis_kelamin") == "P" ? "checked" : ""); ?>>
                                    <label class="custom-control-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-row mb-3 my-0">
                                <div class="form-group col-lg-4">
                                    <label for="kecamatan" class="form-control-label">Kecamatan : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?= old('kecamatan'); ?>" required>
                                </div>
                                <div class="form-group col-lg-8">
                                    <label class="form-control-label" for="alamat">Alamat Lengkap : <small>(Nama Jalan, RT/RW, Desa/Kelurahan, Kode Post)</small> <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3" required maxlength=100><?= old('alamat'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-3">User Contact</h6>
                        <div class="ml-3">
                            <div class="form-row mb-3 my-0">
                                <div class="form-group col-lg-4">
                                    <label for="email" class="form-control-label">Email : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?= old('email'); ?>" required>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="no_hp" class="form-control-label">No Telepon : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="numeric" name="no_hp" id="no_hp" placeholder="No Telepon/Whatsapp" value="<?= old('no_hp'); ?>" required>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-3">Kesiswaan</h6>
                        <div class="ml-3">
                            <div class="form-row my-0">
                                <div class="form-group col-lg-4">
                                    <label for="nisn" class="form-control-label">NISN : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="numeric" name="nisn" id="nisn" placeholder="NISN" value="<?= old('nisn'); ?>" required>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="kelas" class="form-control-label">Kelas : <span class="text-danger">*</span></label>
                                    <select class="form-control" id="kelas" name="kelas">
                                        <option value="">Pilih Kelas</option>
                                        <option value="1" <?= (old("kelas") == "1" ? "selected" : ""); ?>>X</option>
                                        <option value="2" <?= (old("kelas") == "2" ? "selected" : ""); ?>>XI</option>
                                        <option value="3" <?= (old("kelas") == "3" ? "selected" : ""); ?>>XII</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row my-0 mb-3">
                                <div class="form-group col-lg-4">
                                    <label for="jurusan" class="form-control-label">Jurusan : <span class="text-danger">*</span></label>
                                    <select class="form-control" name="jurusan" id="jurusan" onchange="showhideForm(this.value);" required>
                                        <option value="">Pilih Jurusan</option>
                                        <?php foreach ($jurusan as $key => $data) { ?>
                                            <option value="<?= $data->id_jurusan; ?>" <?= (old("jurusan") == $data->id_jurusan ? "selected" : ""); ?>><?= $data->nama_jurusan; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="rombel" class="form-control-label">Rombel : <span class="text-danger">*</span></label>
                                    <select class="form-control" name="rombel" id="rombel" required disabled>
                                        <option value="">Pilih Rombel</option>
                                        <option id="rombel1" value="1" <?= (old("rombel") == "1" ? "selected" : ""); ?>>1</option>
                                        <option id="rombel2" value="2" <?= (old("rombel") == "2" ? "selected" : ""); ?>>2</option>
                                        <option id="rombel3" value="3" <?= (old("rombel") == "3" ? "selected" : ""); ?>>3</option>
                                        <option id="rombel4" value="4" <?= (old("rombel") == "4" ? "selected" : ""); ?>>4</option>
                                    </select>
                                </div>
                                <script>
                                    function showhideForm(jurusan) {
                                        var formRombel = document.getElementById('rombel');
                                        if (jurusan == '' || jurusan == '1' || jurusan == '8') {
                                            formRombel.disabled = true;
                                            formRombel.required = false;
                                        } else if (jurusan == '3' || jurusan == '4' || jurusan == '7' || jurusan == '9') {
                                            document.getElementById('rombel3').hidden = true;
                                            document.getElementById('rombel4').hidden = true;
                                            formRombel.required = true;
                                            formRombel.disabled = false;
                                        } else if (jurusan == '5' || jurusan == '6') {
                                            document.getElementById('rombel3').hidden = false;
                                            document.getElementById('rombel4').hidden = true;
                                            formRombel.required = true
                                            formRombel.disabled = false;
                                        } else {
                                            document.getElementById('rombel3').hidden = false;
                                            document.getElementById('rombel4').hidden = false;
                                            formRombel.required = true
                                            formRombel.disabled = false;
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-3">Kartu Indonesiap Pintar</h6>
                        <div class="ml-3">
                            <div class="form-row my-0 mb-3">
                                <div class="form-group mb-0 my-0 col-lg-4" required>
                                    <label for="kip" class="form-control-label">Penerima KIP : <span class="text-danger">*</span></label>
                                    <div class="custom-control custom-radio mb-3 mt-2 pl-0">
                                        <input type="radio" id="kip" name="kip" value="Ya" onchange="showhideForm1(this.value);" required <?= (old("kip") == "Ya" ? "checked" : ""); ?>>
                                        <label class="text-sm ml-2 mr-3" for="kip">Ya</label>
                                        <input type="radio" id="kip" name="kip" value="Tidak" onchange="showhideForm1(this.value);" required <?= (old("kip") == "Tidak" ? "checked" : ""); ?>>
                                        <label class="text-sm ml-2" for="kip">Tidak</label>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    function showhideForm1(status) {
                                        if (status == "Ya") {
                                            //document.getElementById("div1").style.display = 'block';
                                            document.getElementById("no_kip").required = true;
                                            document.getElementById("no_kip").disabled = false;
                                            document.getElementById("no_rek").required = true;
                                            document.getElementById("no_rek").disabled = false;
                                        }
                                        if (status == "Tidak") {
                                            //document.getElementById("div1").style.display = 'none';
                                            document.getElementById("no_kip").required = false;
                                            document.getElementById("no_kip").disabled = true;
                                            document.getElementById("no_kip").value = null;
                                            document.getElementById("no_rek").required = false;
                                            document.getElementById("no_rek").disabled = true;
                                            document.getElementById("no_rek").value = null;
                                        }
                                    }
                                </script>
                                <div class="form-group col-lg-4">
                                    <label for="no_kip" class="form-control-label">No. KIP : <span class="text-danger">**</span></label>
                                    <input class="form-control" type="numeric" name="no_kip" id="no_kip" placeholder="No. KIP" value="<?= old('no_kip'); ?>" disabled>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="no_rek" class="form-control-label">No. Reknening : <span class="text-danger">**</span></label>
                                    <input class="form-control" type="numeric" name="no_rek" id="no_rek" placeholder="No. Rekening" value="<?= old('no_rek'); ?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-left mb-3">
                                    <h5 class="text-danger mb-0">*) Harus Diisi</h5>
                                    <h5 class="text-danger">**) Harus Diisi Bagi Penerima KIP</h5>
                                </div>
                                <div class="col-lg-9 text-right">
                                    <input class="btn btn-warning mr-2" type="reset" value="Reset">
                                    <input class="btn" type="submit" value="Tambah" style="color: white; background-color: #1174EF">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End of Data Jurusan -->
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