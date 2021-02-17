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
                            <a href="<?= base_url('/operator/guru/list') ?>" class="btn bg-white btn-icon">
                                <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                <span class="btn-inner--text">Kembali</span>
                            </a>
                        </div>
                        <div class="col text-right">
                            <h6 class="h2 text-white d-inline-block mb-0">Form Data Guru</h6>
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
                        <h3 class="mb-0 text-dark">Tambah Data Guru</h3>
                    </div>
                </div>
                <div class="card-body bg-white border-0">
                    <form>
                        <div class="form-group mb-3 my-0">
                            <label for="nisn" class="form-control-label">NIP :</label>
                            <input class="form-control" type="numeric" id="nisn" placeholder="NISN">
                        </div>
                        <div class="form-group mb-3 my-0">
                            <label for="nama" class="form-control-label">Nama :</label>
                            <input class="form-control" type="text" id="nama" placeholder="Nama">
                        </div>
                        <div class="form-group mb-3 my-0">
                            <label for="jeniskelamin" class="form-control-label">Jenis Kelamin :</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="jeniskelamin" name="lakilaki" class="custom-control-input">
                                <label class="custom-control-label" for="lakilaki">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="jeniskelamin" name="perempuan" class="custom-control-input">
                                <label class="custom-control-label" for="prempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group form-row mb-3 my-0">
                            <div class="col-4">
                                <label for="tempatlahir" class="form-control-label">Tempat Lahir :</label>
                                <input class="form-control" type="text" id="tempatlahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="col-8">
                                <label for="tanggallahir" class="form-control-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" id="tanggallahir">
                            </div>
                        </div>
                        <div class="form-group form-row mb-3 my-0">
                            <div class="col-4">
                                <label for="jurusan" class="form-control-label">Jurusan :</label>
                                <select class="form-control" id="jurusan">
                                    <option>Pilih Jurusan</option>
                                    <option>Umum</option>
                                    <option>Teknik Komputer dan Informatika</option>
                                    <option>Teknik Kendarangan Ringan</option>
                                    <option>Teknik Pemesinan</option>
                                    <option>Teknik Pengelasan</option>
                                    <option>Teknik Audio Video</option>
                                    <option>Tata Busana</option>
                                    <option>Teknik Instalasi Tenaga Listrik</option>
                                    <option>Teknik Elektronika Industri</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3 my-0">
                                    <label for="kelas" class="form-control-label">Mata Pelajaran 1 :</label>
                                    <select class="form-control" id="kelas">
                                        <option>Pilih Mata Pelajaran</option>
                                        <option>Pemrograman Web</option>
                                        <option>Jaringan Komputer</option>
                                        <option>XII</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 my-0">
                                    <label for="kelas" class="form-control-label">Mata Pelajaran 2 :</label>
                                    <select class="form-control" id="kelas">
                                        <option>Pilih Mata Pelajaran</option>
                                        <option>Pemrograman Web</option>
                                        <option>Jaringan Komputer</option>
                                        <option>XII</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 my-0">
                                    <label for="kelas" class="form-control-label">Mata Pelajaran 3 :</label>
                                    <select class="form-control" id="kelas">
                                        <option>Pilih Mata Pelajaran</option>
                                        <option>Pemrograman Web</option>
                                        <option>Jaringan Komputer</option>
                                        <option>XII</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <input class="btn btn-warning mr-2" type="reset" value="Reset">
                                <a onclick="addConfirm('<?php echo base_url('/operator/guru/add') ?>')" href="#!" class="btn" type="button" style="color: white; background-color: #1174EF">
                                    <span>Tambah</span>
                                </a>
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

    <script>
        function addConfirm(url) {
            $('#btn-add').attr('href', url);
            $('#addModal').modal();
        }
    </script>

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