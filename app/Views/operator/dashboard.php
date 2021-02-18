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
                                            <span class="h2 font-weight-bold mb-0">7320</span>
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
                                            <span class="h2 font-weight-bold mb-0">65</span>
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
                                            <span class="h2 font-weight-bold mb-0">45</span>
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
                                            <h5 class="card-title text-uppercase text-muted mb-0">Rombel/Kelas</h5>
                                            <span class="h2 font-weight-bold mb-0">32</span>
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
                                            108
                                        </td>
                                        <td>
                                            4
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
                                            432
                                        </td>
                                        <td>
                                            6
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
                                            216
                                        </td>
                                        <td>
                                            4
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
                                            216
                                        </td>
                                        <td>
                                            4
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
                                            324
                                        </td>
                                        <td>
                                            6
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
                                            324
                                        </td>
                                        <td>
                                            6
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
                                            216
                                        </td>
                                        <td>
                                            6
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
                                            108
                                        </td>
                                        <td>
                                            4
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
                                            216
                                        </td>
                                        <td>
                                            7
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
                                    <span class="badge badge-md badge-circle badge-floating badge-danger border-white">3</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 pr-2 pl-2 pb-1">
                            <div class="list-group list-group-flush">
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="ni ni-hat-3"></i>
                                            </div>
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">Amri Lukman Muzaki</h4>
                                            </div>
                                            <p class="text-sm mb-0">Perubahan data NISN</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </div>
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">Rohman Pujadi</h4>
                                            </div>
                                            <p class="text-sm mb-0">Perubahan Tanggal Lahir</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </div>
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0 text-sm">Syukron Jamil</h4>
                                            </div>
                                            <p class="text-sm mb-0">Perubahan NIP</p>
                                        </div>
                                    </div>
                                </a>
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
                    <div class="card bg-white pb-2">
                        <div class="card-header bg-transparent border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Informasi dan Pengumuman</h3>
                                </div>
                                <div class="col-2 text-right justify-content-end">
                                    <a data-toggle="tooltip" data-placement="top" title="Tambah" onclick="addInfoForm('<?php echo base_url('operator/dashboard') ?>')" href="#!">
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
                                        <tr>
                                            <td class="pl-2 pt-0 pr-2 pb-0">
                                                <a href="#!" class="list-group-item list-group-item-action">
                                                    <div class="d-flex">
                                                        <h4 class="mb-0 text-sm">Jadwal Ujian Akhir Semester</h4>
                                                    </div>
                                                    <p class="text-sm mb-0 ">Tahun Ajaran 2021/2022</p>
                                                </a>
                                            </td>
                                            <td class="pl-0 pr-0">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" onclick="editInfoForm('<?php echo base_url('operator/dashboard') ?>')" href="#!">Edit</a>
                                                        <a class="dropdown-item text-danger" onclick="deleteConfirm('<?php echo base_url('operator/dashboard') ?>')" href="#!">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-2 pt-0 pr-2 pb-0">
                                                <a href="#!" class="list-group-item list-group-item-action">
                                                    <div class="d-flex">
                                                        <h4 class="mb-0 text-sm">Pendaftaran POLMAN Astra</h4>
                                                    </div>
                                                    <p class="text-sm mb-0 ">Periode 2021/2022</p>
                                                </a>
                                            </td>
                                            <td class="pl-0 pr-0">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item text-danger" href="#">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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
    </div>
    <!-- ============================================================== -->
    <!-- Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->

    <?= $this->include('operator/info/tambah-info') ?>
    <?= $this->include('operator/__partial/modal') ?>

    <script>
        function addInfoForm(url) {
            $('#btn-add').attr('href', url);
            $('#addModal').modal();
        }
    </script>

    <script>
        function editInfoForm(url) {
            $('#btn-edit').attr('href', url);
            $('#editModal').modal();
        }
    </script>

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