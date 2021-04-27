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
                            <h6 class="h2 text-white d-inline-block mb-0">Data Mata Pelajaran</h6>
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
                        <script>
                            $(document).ready(function() {
                                $("#jurusan").change(function() {
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
                                    var rombel = $("#rombel").val();
                                    var keyword = $("#keyword").val();
                                    window.location.replace("/operator/kelulusan/list?jurusan=" + jurusan + "&rombel=" + rombel + "&keyword=" + keyword);
                                }
                            });
                        </script>
                        <!--==============================================================-->
                        <!-- End of Filter -->
                        <!--==============================================================-->
                        <div class="col-2 pl-2 pr-0">
                        </div>
                        <div class="col-5 pl-2 text-right">
                            <ul class="nav justify-content-end">
                                <li class="mr-2">
                                    <a class="btn btn-icon btn-warning pl-3 pr-3" onclick="resetConfirm('<?= base_url('/operator/kelulusan/resetkelulusan') ?>')" href="#!" data-toggle="tooltip" data-placement="top" title="Reset Data Kelulusan">
                                        <span><i class="fas fa-power-off"></i></span>
                                    </a>
                                </li>
                                <!-- Divider -->
                                <style>
                                    .vl {
                                        border-left: 1px solid darkgrey;
                                        height: 25px;
                                    }
                                </style>
                                <div class="vl mt-2 mr-2 my-0"></div>
                                <li class="mr-2">
                                    <button class="btn btn-icon btn-success pl-3 pr-3" type="button" data-sweet-alert="warning" id="lulus" value='Update' data-toggle="tooltip" data-placement="top" title="Lulus">
                                        <span><i class="fas fa-check-circle"></i></span>
                                    </button>
                                </li>
                                <li class="mr-2">
                                    <button class="btn btn-icon btn-danger pl-3 pr-3" type="button" data-sweet-alert="warning" id="tidaklulus" value='Update' data-toggle="tooltip" data-placement="top" title="Tidak Lulus">
                                        <span><i class="fas fa-times-circle"></i></span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-icon btn-outline-secondary" type="button">
                                        <span class="btn-inner--text">Jumlah : 67</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><input type="checkbox" id="checkall" value="1" class="mt-1"></th>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($siswa as $row) {
                            ?>
                                <tr>
                                    <td><input type="checkbox" class="checkbox" id="checkbox" name="delete" value="<?= $row->nisn; ?>" /></td>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama_siswa; ?></td>
                                    <td><?= $row->nisn; ?></td>
                                    <td><?= $row->akronim_jurusan ?>
                                        <?= $row->rombel ?></td>
                                    <td><?php if ($row->status == 'Lulus') { ?>
                                            <button class="btn btn-sm btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Lulus">
                                                <span><i class="fas fa-check-circle"></i></span>
                                            </button>
                                        <?php } else if ($row->status == 'Tidak Lulus') { ?>
                                            <button class="btn btn-sm btn-icon btn-danger" type="button" data-toggle="tooltip" data-placement="top" title="Tidak Lulus">
                                                <span><i class="fas fa-times-circle"></i></span>
                                            </button>
                                        <?php } ?>
                                    </td>
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

                            // <!--==============================================================-->
                            // <!-- Tombol Lulus -->
                            // <!--==============================================================-->
                            $('#lulus').click(function() {

                                //Confirm alert
                                Swal.fire({
                                    html: '<div class="py-0 px-1 text-center"><i class="fas fa-exclamation-triangle ni-4x mt-0 text-white"></i><h4 class = "heading mt-4 text-white mb-2">ANDA AKAN MELULUSKAN SISWA INI</h4><p class="text-white mb-0">Apakah Anda Yakin?</p>',
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

                                        //Get id_siswa from checed checkboxes
                                        var siswa_arr = [];
                                        $(".checkbox:checked").each(function() {
                                            var id_siswa = $(this).val();
                                            siswa_arr.push(id_siswa);
                                        });

                                        //array length
                                        var length = siswa_arr.length;

                                        if (length > 0) {

                                            //AJAX request
                                            $.ajax({
                                                url: '<?= base_url("operator/kelulusan/editlulus") ?>',
                                                type: 'POST',
                                                data: {
                                                    id_siswas: siswa_arr
                                                },
                                                success: function(response) {
                                                    $('#EditKelulusan').modal({
                                                        backdrop: 'static',
                                                    });
                                                }
                                            });

                                        } else {
                                            $('#MinimalEditAlert').modal()
                                        }
                                    }
                                })
                            });
                            // <!--==============================================================-->
                            // <!-- End of Tombol Lulus -->
                            // <!--==============================================================-->
                            // <!--==============================================================-->
                            // <!-- Tombol Tidak Lulus -->
                            // <!--==============================================================-->
                            $('#tidaklulus').click(function() {

                                //Confirm alert
                                Swal.fire({
                                    html: '<div class="py-0 px-1 text-center"><i class="fas fa-exclamation-triangle ni-4x mt-0 text-white"></i><h4 class = "heading mt-4 text-white mb-2">ANDA TIDAK MELULUSKAN SISWA INI</h4><p class="text-white mb-0">Apakah Anda Yakin?</p>',
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

                                        //Get id_siswa from checed checkboxes
                                        var siswa_arr = [];
                                        $(".checkbox:checked").each(function() {
                                            var id_siswa = $(this).val();
                                            siswa_arr.push(id_siswa);
                                        });

                                        //array length
                                        var length = siswa_arr.length;

                                        if (length > 0) {

                                            //AJAX request
                                            $.ajax({
                                                url: '<?= base_url("operator/kelulusan/edittidaklulus") ?>',
                                                type: 'POST',
                                                data: {
                                                    id_siswas: siswa_arr
                                                },
                                                success: function(response) {
                                                    $('#EditKelulusan').modal({
                                                        backdrop: 'static',
                                                    });
                                                }
                                            });

                                        } else {
                                            $('#MinimalEditAlert').modal()
                                        }
                                    }
                                })
                            });
                            // <!--==============================================================-->
                            // <!-- End of Tombol Tidak Lulus -->
                            // <!--==============================================================-->
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

                    <?= $pager->links('kelulusan', 'pagination') ?>

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
        function resetConfirm(url) {
            $('#btn-reset').attr('href', url);
            $('#resetModal').modal();
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