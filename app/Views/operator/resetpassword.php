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
            <!-- ============================================================== -->
            <!-- Form Reset Password -->
            <!-- ============================================================== -->
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-white border-0">
                        <div class="card-header bg-transparent pb-3">
                            <div class="text-muted text-center mt-1">
                                <h3>Reset Password</h3>
                            </div>
                        </div>
                        <div class="card-body px-lg-4 py-lg-4 mb-3">
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('error'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>

                            <script>
                                var check = function() {
                                    if (document.getElementById('password_baru').value == '') {
                                        document.getElementById('message').innerHTML = '';
                                        document.getElementById('submit').disabled = true;

                                    } else if (document.getElementById('password_baru').value ==
                                        document.getElementById('confirm_password').value) {
                                        document.getElementById('message').style.color = 'green';
                                        document.getElementById('message').innerHTML = 'Matching';
                                        document.getElementById('submit').disabled = false;
                                    } else {
                                        document.getElementById('message').style.color = 'red';
                                        document.getElementById('message').innerHTML = 'Not matching';
                                        document.getElementById('submit').disabled = true;
                                    }
                                }
                            </script>

                            <form method="post" action="<?= base_url('operator/profil/reset/' . $user->id . '') ?>" role="form">
                                <?php csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <label for="id" class="form-control-label">ID/NIP/NISN :</label>
                                    <input class="form-control" id="id" name="id" value="<?= $user->id ?>" type="text" readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-control-label">Password Lama :</label>
                                    <input class="form-control" id="password" name="password" placeholder="Password" type="password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-control-label">Password Baru :</label>
                                    <input class="form-control mb-1" id="password_baru" name="password_baru" placeholder="Password Baru" type="password" onkeyup="check();" required>
                                    <input class="form-control" id="confirm_password" name="confirm_password" placeholder="Password Verify" type="password" onkeyup="check();" required>
                                    <small><span id='message'></span><small>
                                </div>
                                <div class="text-center pt-3">
                                    <button type="submit" id="submit" class="btn" style="color: white; background-color: #1174EF" disabled>Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End of Form Reset Password -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End of Page Content -->
            <!-- ============================================================== -->

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
        function editConfirm(url) {
            $('#btn-edit').attr('href', url);
            $('#editModal').modal();
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