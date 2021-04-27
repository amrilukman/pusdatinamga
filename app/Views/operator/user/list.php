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
                            <h6 class="h2 text-white d-inline-block mb-0">Data User</h6>
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
                            echo form_dropdown('role', $roles, $role, ['class' => 'form-control', 'id' => 'role']);
                            ?>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#role").change(function() {
                                    filter();
                                });
                                $("#keyword").keypress(function(event) {
                                    if (event.keyCode == 13) {
                                        filter();
                                    }
                                });

                                var filter = function() {
                                    var role = $("#role").val();
                                    var keyword = $("#keyword").val();
                                    window.location.replace("/operator/user/list?role=" + role + "&keyword=" + keyword);
                                }
                            });
                        </script>
                        <!--==============================================================-->
                        <!-- End of Filter -->
                        <!--==============================================================-->
                        <div class="col-4"></div>
                        <div class="col-5 text-right">
                            <ul class="nav justify-content-end">
                                <li class="mr-2">
                                    <button class="btn btn-icon btn-danger pl-3 pr-3" type="button" data-sweet-alert="warning" id="resetpassword" value='Update' data-toggle="tooltip" data-placement="top" title="Reset Password">
                                        <span><i class="fas fa-unlock-alt"></i></span>
                                        <b class="pl-2 text-white">Reset Password</b>
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
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($user as $row) {
                            ?>
                                <tr>
                                    <td><input type="checkbox" class="checkbox" id="checkbox" name="delete" value="<?= $row->nik; ?>" /></td>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->email; ?></td>
                                    <td><?= $row->nik ?> </td>
                                    <td><?= strtoupper($row->role); ?></td>
                                    <td class="text-align-center">
                                        <?php if ($row->role == 'guru' or $row->role == 'pegawai' or $row->role == 'operator' or $row->role == 'pimpinan') { ?>
                                            <a title="Edit" href="<?= base_url('/operator/user/edit/' . $row->nik . '') ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Role">
                                                <span><i class="fas fa-pencil-alt"></i></span>
                                            </a>
                                        <?php } else { ?>
                                            <div></div>
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

                            //Delete button clicked
                            $('#resetpassword').click(function() {

                                //Confirm alert
                                Swal.fire({
                                    html: '<div class="py-0 px-1 text-center"><i class="fas fa-exclamation-triangle ni-4x mt-0 text-white"></i><h4 class = "heading mt-4 text-white mb-2">ANDA AKAN MELAKUKAN RESET PASSWORD!</h4><p class="text-white mb-0">Apakah Anda Yakin?</p>',
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

                                        //Get id_user from checed checkboxes
                                        var user_arr = [];
                                        $(".checkbox:checked").each(function() {
                                            var id_user = $(this).val();
                                            user_arr.push(id_user);
                                        });

                                        //array length
                                        var length = user_arr.length;

                                        if (length > 0) {

                                            //AJAX request
                                            $.ajax({
                                                url: '<?= base_url("operator/user/resetpassword") ?>',
                                                type: 'POST',
                                                data: {
                                                    id_users: user_arr
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
                </div>
                <div class="card-footer">
                    <!--==============================================================-->
                    <!-- Custom Pagination - File that you can find on  /pagination.php -->
                    <!--==============================================================-->

                    <?= $pager->links('user', 'pagination') ?>

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