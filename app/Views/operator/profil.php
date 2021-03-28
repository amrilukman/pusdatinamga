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
                        <div class="col">
                            <h6 class="h2 text-white d-inline-block mb-0">Halo, Amri Lukman</h6>
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
                    <div class="row align-items-left">
                        <div class="col-6 pl-3 pr-0 mt-2">
                            <h3 class="mb-0 text-dark">Edit Profil</h3>
                        </div>
                        <div class="col-6 nav justify-content-end">
                            <a href="<?= base_url('operator/profil/resetpassword/' . $user->id . '') ?>" class="btn btn-icon btn-danger" type="button">
                                <span class="btn-inner--text">Reset Password</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white border-0">
                    <form>
                        <h6 class="heading-small text-muted mb-3">User Information</h6>
                        <div class="ml-3">
                            <div class="form-group form-row mb-3 my-0">
                                <div class="col-4">
                                    <label for="nisn" class="form-control-label">ID/NIP/NISN :</label>
                                    <input class="form-control" type="numeric" id="nisn" placeholder="NISN" value="24060118140108">
                                </div>
                                <div class="col-8">
                                    <div class="form-group my-0">
                                        <label for="nama" class="form-control-label">Nama :</label>
                                        <input class="form-control" type="text" id="nama" placeholder="Nama Lengkap" value="Amri Lukman Muzaki">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-row mb-3 my-0">
                                <div class="col-4">
                                    <label for="tempatlahir" class="form-control-label">Tempat Lahir :</label>
                                    <input class="form-control" type="text" id="tempatlahir" placeholder="Tempat Lahir" value="Pemalang">
                                </div>
                                <div class="col-8">
                                    <label for="tanggallahir" class="form-control-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" id="tanggallahir" value="2000-09-20">
                                </div>
                            </div>
                            <div class="form-group mb-3 my-0">
                                <label class="form-control-label">Jenis Kelamin :</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="lakilaki" name="jeniskelamin" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="lakilaki">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="perempuan" name="jeniskelamin" class="custom-control-input">
                                    <label class="custom-control-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-3">User Contact</h6>
                        <div class="ml-3">
                            <div class="form-group form-row mb-3 my-0">
                                <div class="col-4">
                                    <label for="nisn" class="form-control-label">Kecamatan :</label>
                                    <input class="form-control" type="numeric" id="nisn" placeholder="Kecamatan" value="Ulujami">
                                </div>
                                <div class="col-4">
                                    <div class="form-group my-0">
                                        <label for="nama" class="form-control-label">Email :</label>
                                        <input class="form-control" type="text" id="nama" placeholder="Email" value="ampry.muzaki@gmail.com">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group my-0">
                                        <label for="nama" class="form-control-label">No. Telp/WA :</label>
                                        <input class="form-control" type="text" id="nama" placeholder="No. Telp/Whatsapp" value="085777617635">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php $message = ("Jl. Sukorejo Tumbal RT 02/09 Dk. Sumurlembu Ds. Sukorejo Kec. Ulujami Kab. Pemalang 52371"); ?>
                                <label class="form-control-label" for="alamat">Alamat Lengkap</label>
                                <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat Lengkap"><?php echo htmlspecialchars($message); ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <input class="btn btn-warning mr-2" type="reset" value="Reset">
                                <a onclick="editConfirm('<?php echo base_url('/operator/profil') ?>')" href="#!" class="btn" type="button" style="color: white; background-color: #1174EF">
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