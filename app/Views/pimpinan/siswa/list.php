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
                        <div class="col">
                            <h6 class="h2 text-white d-inline-block mb-0">Data Siswa</h6>
                        </div>
                        <div class="col text-right pt-2">
                            <ul class="nav justify-content-end">
                                <li class="pl-1">
                                    <form action="<?= base_url('pimpinan/siswa/exportexcel') ?>" method="POST">
                                        <button type="submit" class="btn bg-white btn-icon pl-3 pr-3" data-toggle="tooltip" data-placement="top" title="Download data">
                                            <span class="btn-inner--icon"><i class="far fa-save"></i></span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 ml-0 text-right pt-2">
                            <form class="search ">
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
                        <div class="col-lg-7 pr-4">
                            <!--==============================================================-->
                            <!-- Filter  -->
                            <!--==============================================================-->
                            <div class="row align-items-left">
                                <div class="col-6 pl-2 pr-0">
                                    <?php
                                    echo form_dropdown('jurusan', $jurusans, $jurusan, ['class' => 'form-control', 'id' => 'jurusan']);
                                    ?>
                                </div>
                                <div class="col-3 pl-2 pr-0">
                                    <?php
                                    echo form_dropdown('kelas', $kelass, $kelas, ['class' => 'form-control', 'id' => 'kelas']);
                                    ?>
                                </div>
                                <div class="col-3 pl-2 pr-0">
                                    <?php
                                    echo form_dropdown('rombel', $rombels, $rombel, ['class' => 'form-control', 'id' => 'rombel', 'disabled' => true]);
                                    ?>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#jurusan").change(function() {
                                            filter();
                                        });
                                        $("#kelas").change(function() {
                                            filter();
                                        });
                                        $("#rombel").change(function() {
                                            filter();
                                        });
                                        $("#keyword").keypress(function(event) {
                                            if (event.keyCode == 13) {
                                                filter();
                                            }
                                        });

                                        var formRombel = document.getElementById('rombel');
                                        var formJurusan = document.getElementById('jurusan');
                                        if (formJurusan.value == '' || formJurusan.value == '1' || formJurusan.value == '8') {
                                            formRombel.disabled = true;
                                        } else {
                                            formRombel.disabled = false;
                                        }

                                        var filter = function() {
                                            var jurusan = $("#jurusan").val();
                                            var kelas = $("#kelas").val();
                                            var rombel = $("#rombel").val();
                                            var keyword = $("#keyword").val();
                                            window.location.replace("/pimpinan/siswa/list?jurusan=" + jurusan + "&kelas=" + kelas + "&rombel=" + rombel + "&keyword=" + keyword);
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                        <!--==============================================================-->
                        <!-- End of Filter -->
                        <!--==============================================================-->
                        <div class="col d-none d-lg-block text-right">
                            <button class="btn btn-icon btn-outline-secondary" type="button">
                                <span class="btn-inner--text">Jumlah : <?= $jumlah ?></span>
                            </button>
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
                                <th scope="col">TTL</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Alamat Lengkap</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Email</th>
                                <th scope="col">Penerima KIP</th>
                                <th scope="col">KIP</th>
                                <th scope="col">Nomor Rekening</th>
                                <th scope="col">NIK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($siswa as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama_siswa; ?></td>
                                    <td><?= $row->nisn; ?></td>
                                    <td><?php if ($row->kelas == 1) {
                                            echo 'X';
                                        } elseif ($row->kelas == 2) {
                                            echo 'XI';
                                        } elseif ($row->kelas == 3) {
                                            echo 'XII';
                                        } ?> <?= $row->akronim_jurusan ?>
                                        <?= $row->rombel ?></td>
                                    <td><?= $row->jenis_kelamin; ?></td>
                                    <td><?= $row->tempat_lahir; ?>, <?= $row->tanggal_lahir ?></td>
                                    <td><?= $row->kecamatan; ?></td>
                                    <td><?= $row->alamat; ?></td>
                                    <td><?= $row->no_hp; ?></td>
                                    <td><?= $row->email_siswa; ?></td>
                                    <td><?= $row->penerima_kip; ?></td>
                                    <td><?= $row->no_kip; ?></td>
                                    <td><?= $row->no_rek; ?></td>
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

                    <?= $pager->links('siswa', 'pagination') ?>

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
    <!-- jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

    <?= $this->include('pimpinan/__partial/js.php') ?>

    <!-- ============================================================== -->
    <!-- End of jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

</body>

</html>