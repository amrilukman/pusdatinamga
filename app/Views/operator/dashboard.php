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
                <!-- ============================================================== -->
                <!-- Data Jurusan -->
                <!-- ============================================================== -->
                <div class="col-xl-8">
                    <div class="card bg-default pb-2">
                        <div class="card-header bg-transparent border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-light text-uppercase ls-1 mb-0">Rangkuman</h6>
                                    <h3 class="mb-0 text-white">Data Jurusan</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Siswa</th>
                                        <th scope="col">Guru</th>
                                        <th scope="col">Rombel/Kelas</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr>
                                        <th scope="row">
                                            Teknik Komputer Jaringan
                                        </th>
                                        <td>
                                            <?= $jumlah_siswa_tkj ?>
                                        </td>
                                        <td>
                                            <?= $jumlah_guru_tkj ?>
                                        </td>
                                        <td>
                                            3
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Teknik Kendaraan Ringan Otomotif
                                        </th>
                                        <td>
                                            <?= $jumlah_siswa_tkr ?>
                                        </td>
                                        <td>
                                            <?= $jumlah_guru_tkr ?>
                                        </td>
                                        <td>
                                            12
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Teknik Pemesinan
                                        </th>
                                        <td>
                                            <?= $jumlah_siswa_tpm ?>
                                        </td>
                                        <td>
                                            <?= $jumlah_guru_tpm ?>
                                        </td>
                                        <td>
                                            6
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Teknik Pengelasan
                                        </th>
                                        <td>
                                            <?= $jumlah_siswa_las ?>
                                        </td>
                                        <td>
                                            <?= $jumlah_guru_las ?>
                                        </td>
                                        <td>
                                            6
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Teknik Audio Video
                                        </th>
                                        <td>
                                            <?= $jumlah_siswa_tav ?>
                                        </td>
                                        <td>
                                            <?= $jumlah_guru_tav ?>
                                        </td>
                                        <td>
                                            9
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Tata Busana
                                        </th>
                                        <td>
                                            <?= $jumlah_siswa_tb ?>
                                        </td>
                                        <td>
                                            <?= $jumlah_guru_tb ?>
                                        </td>
                                        <td>
                                            9
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Desain Pemodelan dan Informasi Bangunan
                                        </th>
                                        <td>
                                            <?= $jumlah_siswa_dpib ?>
                                        </td>
                                        <td>
                                            <?= $jumlah_guru_dpib ?>
                                        </td>
                                        <td>
                                            6
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Teknik Instalasi Tenaga Listrik
                                        </th>
                                        <td>
                                            <?= $jumlah_siswa_titl ?>
                                        </td>
                                        <td>
                                            <?= $jumlah_guru_titl ?>
                                        </td>
                                        <td>
                                            3
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            Teknik Elektronika Industri
                                        </th>
                                        <td>
                                            <?= $jumlah_siswa_elin ?>
                                        </td>
                                        <td>
                                            <?= $jumlah_guru_elin ?>
                                        </td>
                                        <td>
                                            6
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End of Data Jurusan -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Notifikasi Perubahan Data -->
                <!-- ============================================================== -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h3 class="mb-0">Notifikasi Perubahan Data</h3>
                                </div>
                                <div class="col-2 text-right justify-content-end">
                                    <span class="badge badge-md badge-circle badge-floating badge-danger border-white"><?= $jumlah_perubahan ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 pr-2 pl-2 pb-0">
                            <div class="list-group list-group-flush">
                                <?php foreach ($perubahan as $perubahan) { ?>
                                    <a class="list-group-item list-group-item-action" href="<?= base_url('operator/perubahan/detail/' . $perubahan->id_perubahan . '') ?>">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                    <i class="ni ni-bell-55"></i>
                                                </div>
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0 text-sm"><?= $perubahan->nama ?></h4>
                                                </div>
                                                <p class="text-sm mb-0">PERUBAHAN DATA <?= strtoupper($perubahan->kategori_perubahan) ?></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                            <!-- <small class="text-center">Tidak ada permintaan perubahan data</small> -->
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End of Notifikasi Perubahan Data -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Informasi dan Pengumuman -->
                    <!-- ============================================================== -->
                    <?php if (!empty(session()->getFlashdata('message'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show mb-3 mt-0" role="alert">
                            <?php echo session()->getFlashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>
                    <div class="card bg-white pb-0">
                        <div class="card-header bg-transparent border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Informasi dan Pengumuman</h3>
                                </div>
                                <div class="col-2 text-right justify-content-end">
                                    <a data-toggle="tooltip" data-placement="top" title="Tambah" href="<?= base_url('/operator/info/add') ?>">
                                        <button class="btn btn-icon pl-1 pr-1 pt-0 pb-0" type="button" style="border-radius: 100%; background-color: #1174EF">
                                            <span class="btn-inner--icon"><i class="text-white ni ni-fat-add"></i></span>
                                        </button>
                                    </a>
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
                                                <td class="pl-0 pr-0">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="<?= base_url('operator/info/edit/' . $info->id_info . '') ?>">Edit</a>
                                                            <a class="dropdown-item text-danger" onclick="deleteConfirm('<?= base_url('operator/info/delete/' . $info->id_info . '') ?>')" href="#!">Hapus</a>
                                                        </div>
                                                    </div>
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

        <?= $this->include('operator/__partial/footer') ?>

        <!-- ============================================================== -->
        <!-- End of Footer - File that you can find on __partial/footer.php -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->

    <?= $this->include('operator/__partial/modal') ?>

    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
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