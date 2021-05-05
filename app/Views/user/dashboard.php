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
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <h2 class="text-weight-block text-white">Rangkuman Data</h2>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Rangkuman data -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Siswa</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= $jumlah_siswa ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-hat-3"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Guru</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= $jumlah_guru ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pegawai</h5>
                                            <span class="h2 font-weight-bold mb-0"><?= $jumlah_pegawai ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="fas fa-briefcase"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Kelas</h5>
                                            <span class="h2 font-weight-bold mb-0">60</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="ni ni-chart-bar-32"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <div class="row">
                <div class="col-xl-8">
                    <!-- ============================================================== -->
                    <!-- Form Informasi Kelulusan -->
                    <!-- ============================================================== -->
                    <?php if ($jumlah_kelulusan > 0) { ?>
                        <div class="card">
                            <div class="card-header bg-transparent">
                                <h3 class="mb-0">Informasi Kelulusan</h3>
                                <h6 class="text-muted text-uppercase ls-1 mb-0">Tahun Ajaran 2021/2022</h6>
                            </div>
                            <div class="card-body pt-2 pb-2">
                                <form method="post" action="<?= base_url('user/kelulusan/page') ?>">
                                    <div class="form-group mb-4 mt-2">
                                        <label for="nisn" class="form-control-label">NISN / Nama :</label>
                                        <input class="form-control" type="text" id="nisn" name="nisn" placeholder="NISN / Nama" required>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col text-right">
                                            <input class="btn btn-warning mr-2" type="reset" value="Reset">
                                            <input class="btn" type="submit" value="Submit" style="color: white; background-color: #1174EF">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div></div>
                    <?php } ?>
                    <!-- ============================================================== -->
                    <!-- Data Anda => Guru -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <div class="row">
                                <div class="col">
                                    <h3 class="mb-0">Data Anda</h3>
                                </div>
                                <div class="col-4 text-right justify-content-end">
                                    <a href="<?= base_url('/user/perubahan/add') ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Request Perubahan Data">
                                        <span><i class="fas fa-pencil-alt"></i></span>
                                    </a>
                                    <a href="<?= base_url('/user/profil') ?>" type="button" style="color: white; background-color: #1174EF" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                        <span><i class="fas fa-user"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-2 pb-2">
                            <h6 class="heading-small text-muted mb-2">Data Diri</h6>
                            <div class="ml-3">
                                <div class="list-group list-group-flush ml-2 mt-1">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 ml--2 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">NIK</h4>
                                            </div>
                                            <p class="text-sm mb-0"><?= $data->nik ?></p>
                                        </div>
                                        <div class="col-lg-6 ml--2 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">Nama</h4>
                                            </div>
                                            <p class="text-sm mb-0"><?= $user->nama ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush ml-2 mt-1">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 ml--2 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">Jenis Kelamin</h4>
                                            </div>
                                            <p class="text-sm mb-0"><?php if ($data->jenis_kelamin == 'L') {
                                                                        echo 'Laki-Laki';
                                                                    } else if ($data->jenis_kelamin == 'P') {
                                                                        echo 'Perempuan';
                                                                    }; ?></p>
                                        </div>
                                        <div class="col-lg-6 ml--2 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">TTL</h4>
                                            </div>
                                            <p class="text-sm mb-0"><?= $data->tempat_lahir ?>, <?= $data->tanggal_lahir ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3">
                            <?php if (session()->get('role') == 'pegawai' or session()->get('role') == 'guru') { ?>
                                <h6 class="heading-small text-muted mb-2">Kepegawaian</h6>
                                <div class="ml-3">
                                    <div class="list-group list-group-flush ml-2 mt-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">Status Kepegawaian</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->status_kepegawaian ?></p>
                                            </div>
                                            <?php if (session()->get('role') == 'guru') { ?>
                                                <div class="col-lg-6 ml--2 mb-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="mb-0 text-sm">Jurusan</h4>
                                                    </div>
                                                    <p class="text-sm mb-0"><?= $data->akronim_jurusan ?></p>
                                                </div>
                                            <?php } else if (session()->get('role') == 'pegawai') { ?>
                                                <div class="col-lg-6 ml--2 mb-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="mb-0 text-sm">Kategori</h4>
                                                    </div>
                                                    <p class="text-sm mb-0"><?= $data->nama_kategori ?></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="list-group list-group-flush ml-2 mt-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">SK-CPNS</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->sk_cpns ?></p>
                                            </div>
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">NIP</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->nip ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group list-group-flush ml-2 mt-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">NUPTK</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->nuptk ?></p>
                                            </div>
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">NPWP</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->npwp ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else if (session()->get('role') == 'siswa') { ?>
                                <h6 class="heading-small text-muted mb-2">Kesiswaan</h6>
                                <div class="ml-3">
                                    <div class="list-group list-group-flush ml-2 mt-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">NISN</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->nisn ?></p>
                                            </div>
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">Kelas</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?php if ($data->kelas == 1) {
                                                                            echo 'X';
                                                                        } elseif ($data->kelas == 2) {
                                                                            echo 'XI';
                                                                        } elseif ($data->kelas == 3) {
                                                                            echo 'XII';
                                                                        } ?> <?= $data->akronim_jurusan ?>
                                                    <?= $data->rombel ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <h6 class="heading-small text-muted mb-2">Kartu Indonesia Pintar</h6>
                                <div class="ml-3">
                                    <div class="list-group list-group-flush ml-2 mt-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">Penerima KIP</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->penerima_kip ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group list-group-flush ml-2 mt-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">No. KIP</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->no_kip ?></p>
                                            </div>
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">No. Rekening</h4>
                                                </div>
                                                <p class="text-sm mb-0"> <?= $data->no_rek ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else if (session()->get('role') == 'alumni') { ?>
                                <h6 class="heading-small text-muted mb-2">Kesiswaan</h6>
                                <div class="ml-3">
                                    <div class="list-group list-group-flush ml-2 mt-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">NISN</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->nisn ?></p>
                                            </div>
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">Kelas</h4>
                                                </div>
                                                <p class="text-sm mb-0">
                                                    <?= $data->akronim_jurusan ?>
                                                    <?= $data->rombel ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">Tahun Lulus</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->tahun_lulus ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <h6 class="heading-small text-muted mb-2">Post Graduate</h6>
                                <div class="ml-3">
                                    <div class="list-group list-group-flush ml-2 mt-1">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">Status</h4>
                                                </div>
                                                <p class="text-sm mb-0"><?= $data->status ?></p>
                                            </div>
                                            <div class="col-lg-6 ml--2 mb-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm">Instansi</h4>
                                                </div>
                                                <p class="text-sm mb-0"> <?= $data->instansi ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End of Data Anda => Guru -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- Notifikasi Perubahan Data -->
                <!-- ============================================================== -->
                <div class="col-xl-4">
                    <?php if (!empty(session()->getFlashdata('message'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show mb-3 mt-0" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h3 class="mb-0">Notifikasi Perubahan Data</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pl-0 pr-0 pt-0 pb-0">
                            <div class="table-responsive">
                                <table class="table align-items-center list-group-flush">
                                    <tbody class="list pl-4 pt-2 pb-2">
                                        <?php foreach ($perubahan as $perubahan) { ?>
                                            <?php if ($perubahan->status == 'done') { ?>
                                                <tr></tr>
                                            <?php } else { ?>
                                                <tr>
                                                    <td class="pl-4">
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <?php if ($perubahan->status == 'processed') { ?>
                                                                    <h4 class="mb-0 text-sm"><?= ucfirst($perubahan->status) ?></h4>
                                                                <?php } else if ($perubahan->status == 'approved') { ?>
                                                                    <h4 class="mb-0 text-sm text-success"><?= ucfirst($perubahan->status) ?></h4>
                                                                <?php } else if ($perubahan->status == 'rejected') { ?>
                                                                    <h4 class="mb-0 text-sm text-danger"><?= ucfirst($perubahan->status) ?></h4>
                                                                <?php } ?>
                                                            </div>
                                                            <p class="text-sm mb-0">PERUBAHAN <?= strtoupper($perubahan->kategori_perubahan) ?></p>
                                                        </div>
                                                    </td>
                                                    <?php if ($perubahan->status == 'approved' || $perubahan->status == 'rejected') { ?>
                                                        <td class="pl-0 pr-3 text-center">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="<?= base_url('user/perubahan/selesai/' . $perubahan->id_perubahan . '') ?>" role="button" data-toggle="tooltip" data-placement="top" title="Tandai Selesai">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End of Notifikasi Perubahan Data -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Informasi dan Pengumuman -->
                    <!-- ============================================================== -->
                    <div class="card bg-white pb-0">
                        <div class="card-header bg-transparent border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Informasi dan Pengumuman</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pl-0 pr-0 pt-0 pb-0">
                            <div class="table-responsive">
                                <table class="table align-items-center list-group-flush">
                                    <tbody class="list">
                                        <?php foreach ($info as $info) { ?>
                                            <tr>
                                                <td class="pl-2 pt-0 pr-2 pb-0">
                                                    <a href="<?= $info->link_info ?>" target="_blank" class="list-group-item list-group-item-action" type=>
                                                        <div class="d-flex">
                                                            <h4 class="mb-0 text-sm"><?= $info->judul_info ?></h4>
                                                        </div>
                                                        <p class="text-sm mb-0 "><?= $info->deskripsi_info ?></p>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End of Informasi dan Pengumuman -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End of Page Content -->
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
    <!-- End Page Content -->
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