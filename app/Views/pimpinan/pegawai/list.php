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
                        <div class="col-3 ">
                            <h6 class="h2 text-white d-inline-block mb-0">Data Pegawai</h6>
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
                                <li class="pl-1 mr-1">
                                    <form action="<?= base_url('pimpinan/pegawai/exportexcel') ?>" method="POST">
                                        <button type="submit" class="btn bg-white btn-icon pl-3 pr-3" data-toggle="tooltip" data-placement="top" title="Download data">
                                            <span class="btn-inner--icon"><i class="far fa-save"></i></span>
                                        </button>
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
                        <!-- Filter Kategori -->
                        <!--==============================================================-->
                        <div class="col-3 pl-2 pr-0">
                            <?php
                            echo form_dropdown('kategori', $kategoris, $kategori, ['class' => 'form-control', 'id' => 'kategori']);
                            ?>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#kategori").change(function() {
                                    filter();
                                });
                                $("#keyword").keypress(function(event) {
                                    if (event.keyCode == 13) {
                                        filter();
                                    }
                                });

                                var filter = function() {
                                    var kategori = $("#kategori").val();
                                    var keyword = $("#keyword").val();
                                    window.location.replace("/pimpinan/pegawai/list?kategori=" + kategori + "&keyword=" + keyword);
                                }
                            });
                        </script>
                        <!--==============================================================-->
                        <!-- End of Filter kategori -->
                        <!--==============================================================-->
                        <div class="col-3 pl-2 pr-0">
                        </div>
                        <div class="col-6 text-left">
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
                                <th scope="col">JK</th>
                                <th scope="col">TTL</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Alamat Lengkap</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Email</th>
                                <th scope="col">PNS/Non-PNS</th>
                                <th scope="col">SK CPNS</th>
                                <th scope="col">NIP</th>
                                <th scope="col">SK Pengangkatan</th>
                                <th scope="col">NUPTK</th>
                                <th scope="col">NPWP</th>
                                <th scope="col">NIK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pegawai as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama_pegawai; ?></td>
                                    <td><?= $row->jenis_kelamin; ?></td>
                                    <td><?= $row->tempat_lahir ?>, <?= $row->tanggal_lahir ?></td>
                                    <td><?= $row->kecamatan; ?></td>
                                    <td><?= $row->alamat; ?></td>
                                    <td><?= $row->nama_kategori; ?></td>
                                    <td><?= $row->no_hp; ?></td>
                                    <td><?= $row->email_pegawai; ?></td>
                                    <td><?= $row->status_kepegawaian; ?></td>
                                    <td><?= $row->sk_cpns; ?></td>
                                    <td><?= $row->nip; ?></td>
                                    <td><?= $row->sk_pengangkatan; ?></td>
                                    <td><?= $row->nuptk; ?></td>
                                    <td><?= $row->npwp; ?></td>
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

                    <?= $pager->links('pegawai', 'pagination') ?>

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