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
                    <!-- ============================================================== -->
                    <!-- End of Notifikasi Perubahan Data -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Informasi dan Pengumuman -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Informasi dan Pengumuman</h3>
                        </div>
                        <div class="card-body pt-0 pr-2 pl-2 pb-1">
                            <div class="list-group list-group-flush">
                                <a href="https://smkn1amga.sch.id" target="_blank" class="list-group-item list-group-item-action">
                                    <div class="d-flex">
                                        <h4 class="mb-0 text-sm">Jadwal Ujian Akhir Semester</h4>
                                    </div>
                                    <p class="text-sm mb-0 ">Tahun Ajaran 2021/2022</p>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="d-flex">
                                        <h4 class="mb-0 text-sm">Pendaftaran POLMAN Astra</h4>
                                    </div>
                                    <p class="text-sm mb-0 ">Periode 2021/2022</p>
                                </a>
                            </div>
                            <!-- <small class="text-center">Tidak ada pengumuman</small> -->
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End of Informasi dan Pengumuman -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Form Informasi Kelulusan -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Informasi Kelulusan</h3>
                            <h6 class="text-muted text-uppercase ls-1 mb-0">Tahun Ajaran 2021/2022</h6>
                        </div>
                        <div class="card-body pt-2 pb-2">
                            <form>
                                <div class="form-group mb-4 mt-2">
                                    <label for="nisn" class="form-control-label">NISN / Nama :</label>
                                    <input class="form-control" type="numeric" id="nisn" placeholder="NISN / Nama" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col text-right">
                                        <a onclick="lulusModal('<?php echo base_url('/user/dashboard') ?>')" href="#!" class="btn" type="submit" style="color: white; background-color: #1174EF">
                                            <span>Cari</span>
                                        </a>
                                    </div>
                                </div>
                            </form>
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
    <!-- Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->

    <?= $this->include('user/lulus') ?>

    <!-- Kelulusan Modul -->
    <script>
        function lulusModal(url) {
            $('#btn-lulus').attr('href', url);
            $('#lulusModal').modal();
        }
    </script>

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