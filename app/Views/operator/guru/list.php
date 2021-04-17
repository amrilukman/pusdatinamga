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
                        <div class="col-3">
                            <h6 class="h2 text-white d-inline-block mb-0">Data Guru</h6>
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
                                    <form action="<?= base_url('operator/guru/exportexcel') ?>" method="POST">
                                        <button type="submit" class="btn bg-white btn-icon pl-3 pr-3" data-toggle="tooltip" data-placement="top" title="Download data">
                                            <span class="btn-inner--icon"><i class="far fa-save"></i></span>
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <a href="<?= base_url('operator/guru/add') ?>" class="btn btn-icon bg-white pl-3 pr-3" type="button" style="margin-left: 3pt;" data-toggle="tooltip" data-placement="top" title="Tambah data">
                                        <div class="media align-items-center">
                                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                            <div class="media-body ml-0 d-none d-lg-block">
                                                <span class="mb-0 text-sm pl-2 font-weight-bold">Tambah</span>
                                            </div>
                                        </div>
                                    </a>
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
                        <!-- Filter Jurusan -->
                        <!--==============================================================-->
                        <div class="col-3 pl-2 pr-0">
                            <?php
                            echo form_dropdown('jurusan', $jurusans, $jurusan, ['class' => 'form-control', 'id' => 'jurusan']);
                            ?>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#jurusan").change(function() {
                                    filter();
                                });
                                $("#keyword").keypress(function(event) {
                                    if (event.keyCode == 13) {
                                        filter();
                                    }
                                });

                                var filter = function() {
                                    var jurusan = $("#jurusan").val();
                                    var keyword = $("#keyword").val();
                                    window.location.replace("/operator/guru/list?jurusan=" + jurusan + "&keyword=" + keyword);
                                }
                            });
                        </script>
                        <!--==============================================================-->
                        <!-- End of Filter Jurusan -->
                        <!--==============================================================-->
                        <div class="col-3 pl-2 pr-0">
                        </div>
                        <div class="col-6 pl-2 text-right">
                            <ul class="nav justify-content-end">
                                <li class="mr-2">
                                    <small><span id='message'></span></small>
                                    <button class="btn btn-icon btn-danger pl-3 pr-3" type="button" data-sweet-alert="warning" id="delete" value='Delete' data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                        <span><i class="far fa-trash-alt"></i></span>
                                    </button>
                                </li>
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
                                <th scope="col"><input type="checkbox" id="checkall" value="1" class="mt-1"></th>
                                <th scope="col">Action</th>
                                <th scope="col">Nama</th>
                                <th scope="col">JK</th>
                                <th scope="col">TTL</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Alamat Lengkap</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Email</th>
                                <th scope="col">PNS/Non-PNS</th>
                                <th scope="col">SK CPNS</th>
                                <th scope="col">NIP</th>
                                <th scope="col">NUPTK</th>
                                <th scope="col">NPWP</th>
                                <th scope="col">NIK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($guru as $row) {
                            ?>
                                <tr>
                                    <td><input type="checkbox" class="checkbox" id="checkbox" name="delete" value="<?= $row->nik; ?>" /></td>
                                    <!-- <td><?= $no++; ?></td> -->
                                    <td class="text-center">
                                        <a title="Edit" href="<?= base_url('/operator/guru/edit/' . $row->nik . '') ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit data">
                                            <span><i class="fas fa-pencil-alt"></i></span>
                                        </a>
                                    </td>
                                    <td><?= $row->nama_guru; ?></td>
                                    <td><?= $row->jenis_kelamin; ?></td>
                                    <td><?= $row->tempat_lahir ?>, <?= $row->tanggal_lahir ?></td>
                                    <td><?= $row->kecamatan; ?></td>
                                    <td><?= $row->alamat; ?></td>
                                    <td><?= $row->akronim_jurusan; ?></td>
                                    <td><?= $row->no_hp; ?></td>
                                    <td><?= $row->email_guru; ?></td>
                                    <td><?= $row->status_kepegawaian; ?></td>
                                    <td><?= $row->sk_cpns; ?></td>
                                    <td><?= $row->nip; ?></td>
                                    <td><?= $row->nuptk; ?></td>
                                    <td><?= $row->npwp; ?></td>
                                    <td><?= $row->nik; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!--==============================================================-->
                    <!-- Multiple Select Row -->
                    <!--==============================================================-->
                    <script>
                        $(document).ready(function() {

                            //Check all;
                            $("#checkall").change(function() {

                                var checked = $(this).is(':checked');
                                if (checked) {
                                    $(".checkbox").each(function() {
                                        $(this).prop("checked", true);
                                    });
                                } else {
                                    $(".checkbox").each(function() {
                                        $(this).prop("checked", false);
                                    });
                                }
                            });

                            //Changing state of CheckAll Checkbox
                            $(".checkbox").click(function() {

                                if ($(".checkbox").length == $(".checkbox:checked").length) {
                                    $("#checkall").prop("checked", true);
                                } else {
                                    $("#checkall").prop("checked", false);
                                }
                            });

                            //Delete button clicked
                            $('#delete').click(function() {

                                //Confirm alert
                                Swal.fire({
                                    html: '<div class="py-0 px-1 text-center"><i class="fas fa-exclamation-triangle ni-4x mt-0 text-white"></i><h4 class = "heading mt-4 text-white mb-2">DATA YANG SUDAH DIHAPUS TIDAK BISA DIKEMBALIKAN!</h4><p class="text-white mb-0">Anda yakin ingin menghapus data ini?</p>',
                                    //type: 'warning',
                                    background: 'linear-gradient(87deg, #fb6340 0, #fbb140 100%)',
                                    showCancelButton: true,
                                    cancelButtonClass: 'btn btn-secondary mb-1',
                                    cancelButtonText: 'Kembali',
                                    buttonsStyling: false,
                                    confirmButtonText: 'Ya',
                                    confirmButtonClass: 'btn btn-link text-white ml-auto mb-1 mt-0'
                                }).then((result) => {

                                    if (result.value) {

                                        //Get id_guru from checed checkboxes
                                        var guru_arr = [];
                                        $(".checkbox:checked").each(function() {
                                            var id_guru = $(this).val();
                                            guru_arr.push(id_guru);
                                        });

                                        //array length
                                        var length = guru_arr.length;

                                        if (length > 0) {

                                            //AJAX request
                                            $.ajax({
                                                url: '<?= base_url("operator/guru/deleteuser") ?>',
                                                type: 'POST',
                                                data: {
                                                    id_gurus: guru_arr
                                                },
                                                success: function(response) {
                                                    $('#MultipleDelete').modal({
                                                        backdrop: 'static',
                                                    });
                                                }
                                            });

                                        } else {
                                            $('#MinimalAlert').modal()
                                        }
                                    }
                                })
                            });
                        });
                    </script>
                    <!--==============================================================-->
                    <!-- End of Multiple Select Row -->
                    <!--==============================================================-->
                </div>
                <div class="card-footer">
                    <!--==============================================================-->
                    <!-- Custom Pagination - File that you can find on  /pagination.php -->
                    <!--==============================================================-->

                    <?= $pager->links('guru', 'pagination') ?>

                    <!--==============================================================-->
                    <!-- End of Custom Pagination - File that you can find on  /pagination.php -->
                    <!--==============================================================-->
                </div>
            </div>
        </div>
        <!--==============================================================-->
        <!-- End Page Content-->
        <!--==============================================================-->
        <!--==============================================================-->
        <!--Footer - File that you can find on __partial/footer.php-->
        <!--==============================================================-->

        <?= $this->include('operator/__partial/footer') ?>

        <!--==============================================================-->
        <!--End of Footer - File that you can find on __partial / footer.php-->
        <!--==============================================================-->
    </div>
    <!--==============================================================-->
    <!--Modal - File that you can find on __partial/modal.php-->
    <!--==============================================================-->

    <?= $this->include('operator/__partial/modal') ?>

    <!--============================================================== -->
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