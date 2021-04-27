<!-- ============================================================== -->
<!-- Header - File that you can find on __partial/header.php -->
<!-- ============================================================== -->

<?= $this->include('pimpinan/__partial/header') ?>

<!-- ============================================================== -->
<!-- Body -->
<!-- ============================================================== -->

<body>

    <!-- ============================================================== -->
    <!-- Sidebar - File that you can find on __partial/sidebar.php -->
    <!-- ============================================================== -->

    <?= $this->include('pimpinan/__partial/sidebar') ?>

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

        <?= $this->include('pimpinan/__partial/navbar') ?>

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
                        <div class="col-3">
                            <h6 class="h2 text-white d-inline-block mb-0">Data Alumni</h6>
                        </div>
                        <div class="col-9 text-right">
                            <ul class="nav justify-content-end">
                                <li class="pr-1">
                                    <form class="search mb-1">
                                        <div class="input-group input-group-merge">
                                            <?php
                                            $form_keyword = [
                                                'type'  => 'text',
                                                'name'  => 'keyword',
                                                'id'    => 'keyword',
                                                'value' => $keyword,
                                                'class' => 'form-control search__field',
                                                'placeholder' => 'Search',
                                                'style' => 'height: 44px;',
                                                'aria-label' => 'Search'
                                            ];
                                            echo '<div class="input-group-prepend"><span class="input-group-text" style="color: #525f7f;"><i class="fas fa-search"></i></span></div>';
                                            echo form_input($form_keyword);
                                            ?>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
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
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-left">
                        <!--==============================================================-->
                        <!-- Filter  -->
                        <!--==============================================================-->
                        <div class="col-3 pl-2 pr-0">
                            <?php
                            echo form_dropdown('jurusan', $jurusans, $jurusan, ['class' => 'form-control', 'id' => 'jurusan']);
                            ?>
                        </div>
                        <div class="col-2 pl-2 pr-0">
                            <?php
                            echo form_dropdown('rombel', $rombels, $rombel, ['class' => 'form-control', 'id' => 'rombel', 'disabled' => true]);
                            ?>
                        </div>
                        <div class="col-1 pl-2 pr-0">
                            <?php
                            echo form_dropdown('tahun_lulus', $tahun_luluss, $tahun_lulus, ['class' => 'form-control', 'id' => 'tahun_lulus']);
                            ?>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#jurusan").change(function() {
                                    filter();
                                });
                                $("#rombel").change(function() {
                                    filter();
                                });
                                $("#tahun_lulus").change(function() {
                                    filter();
                                });
                                $("#keyword").keypress(function(event) {
                                    if (event.keyCode == 13) {
                                        filter();
                                    }
                                });

                                var formRombel = document.getElementById('rombel');
                                var formJurusan = document.getElementById('jurusan');
                                var formJurusan = document.getElementById('tahun_lulus');
                                if (formJurusan.value == '' || formJurusan.value == '1' || formJurusan.value == '8') {
                                    formRombel.disabled = true;
                                } else {
                                    formRombel.disabled = false;
                                }

                                var filter = function() {
                                    var jurusan = $("#jurusan").val();
                                    var rombel = $("#rombel").val();
                                    var tahun_lulus = $("#tahun_lulus").val();
                                    var keyword = $("#keyword").val();
                                    window.location.replace("/pimpinan/alumni/list?jurusan=" + jurusan + "&rombel=" + rombel + "&tahun_lulus=" + tahun_lulus + "&keyword=" + keyword);
                                }
                            });
                        </script>
                        <!--==============================================================-->
                        <!-- End of Filter -->
                        <!--==============================================================-->
                        <div class="col-1"></div>
                        <div class="col-5 text-right">
                            <ul class="nav justify-content-end">
                                <li>
                                    <button class="btn btn-icon btn-outline-secondary" type="button">
                                        <span class="btn-inner--text">Jumlah : <?= $jumlah ?></span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table id="myTable" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">JK</th>
                                <th scope="col">Tahun Lulus</th>
                                <th scope="col">Status</th>
                                <th scope="col">Instansi</th>
                                <th scope="col">TTL</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Alamat Lengkap</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Email</th>
                                <th scope="col">NIK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($alumni as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama_alumni; ?></td>
                                    <td><?= $row->nisn; ?></td>
                                    <td><?= $row->akronim_jurusan ?> <?= $row->rombel ?> </td>
                                    <td><?= $row->jenis_kelamin; ?></td>
                                    <td><?= $row->tahun_lulus; ?></td>
                                    <td><?= $row->status; ?></td>
                                    <td><?= $row->instansi; ?></td>
                                    <td><?= $row->tempat_lahir; ?>, <?= $row->tanggal_lahir ?></td>
                                    <td><?= $row->kecamatan; ?></td>
                                    <td><?= $row->alamat; ?></td>
                                    <td><?= $row->no_hp; ?></td>
                                    <td><?= $row->email_alumni; ?></td>
                                    <td><?= $row->nik; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <!--==============================================================-->
                    <!-- Custom Pagination - File that you can find on  /pagination.php -->
                    <!--==============================================================-->

                    <?= $pager->links('alumni', 'pagination') ?>

                    <!--==============================================================-->
                    <!-- End of Custom Pagination - File that you can find on  /pagination.php -->
                    <!--==============================================================-->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Footer - File that you can find on __partial/footer.php -->
        <!-- ============================================================== -->

        <?= $this->include('pimpinan/__partial/footer') ?>

        <!-- ============================================================== -->
        <!-- End of Footer - File that you can find on __partial/footer.php -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->

    <?= $this->include('pimpinan/__partial/modal') ?>

    <!-- ============================================================== -->
    <!-- End of Modal - File that you can find on __partial/modal.php -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

    <?= $this->include('pimpinan/__partial/js.php') ?>

    <!-- ============================================================== -->
    <!-- End of jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

</body>

</html>