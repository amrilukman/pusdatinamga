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
                            <a href="<?= base_url('/operator/alumni/list') ?>" class="btn bg-white btn-icon">
                                <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                <span class="btn-inner--text">Kembali</span>
                            </a>
                        </div>
                        <div class="col text-right">
                            <h6 class="h2 text-white d-inline-block mb-0">Form Data Alumni</h6>
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
                        <h3 class="mb-0 text-dark">Edit Data Alumni</h3>
                    </div>
                </div>
                <div class="card-body bg-white border-0">
                    <form>
                        <div class="form-group mb-3 my-0">
                            <label for="nisn" class="form-control-label">Nama :</label>
                            <input class="form-control" type="numeric" id="nisn" value="Amri Lukman Muzaki" placeholder="Nama Lengkap Alumni">
                        </div>
                        <div class="form-group mb-3 my-0">
                            <label for="nama" class="form-control-label">NISN :</label>
                            <input class="form-control" type="text" id="nama" value="24060118140108" placeholder="NISN">
                        </div>
                        <div class="form-group form-row mb-3 my-0">
                            <div class="col-4">
                                <label for="jurusan" class="form-control-label">Jurusan :</label>
                                <select class="form-control" id="jurusan">
                                    <option>Pilih Jurusan</option>
                                    <option>Umum</option>
                                    <option selected>Teknik Komputer dan Informatika</option>
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
                                <div class="form-group mb-0 my-0">
                                    <label for="kelas" class="form-control-label">Rombel :</label>
                                    <select class="form-control" id="kelas">
                                        <option>Pilih Kelas</option>
                                        <option>Pemrograman Web</option>
                                        <option>Jaringan Komputer</option>
                                        <option selected>1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-0 my-0">
                                    <label for="kelas" class="form-control-label">Tahun Lulus :</label>
                                    <select class="form-control" id="kelas">
                                        <option selected>2018</option>
                                        <option>Pemrograman Web</option>
                                        <option>Jaringan Komputer</option>
                                        <option>XII</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="suratkelulusan" class="form-control-label">Surat Kelulusan :</label>
                            <div class="mb-3 my-0 custom-file">
                                <input type="file" class="custom-file-input" id="suratkelulusan" lang="en">
                                <label class="custom-file-label" for="suratkelulusan">Select file</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <input class="btn btn-warning mr-2" type="reset" value="Reset">
                                <a onclick="editConfirm('<?php echo base_url('/operator/alumni/edit') ?>')" href="#!" class="btn" type="button" style="color: white; background-color: #1174EF">
                                    <span>Edit</span>
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
        function editConfirm(url) {
            $('#btn-edit').attr('href', url);
            $('#editModal').modal();
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