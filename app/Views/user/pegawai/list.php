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
                        <div class="col-3 ">
                            <h6 class="h2 text-white d-inline-block mb-0">Data Pegawai</h6>
                        </div>
                        <div class="col-9 text-right">
                            <ul class="nav justify-content-end">
                                <li class="mr-1">
                                    <form class="search mb-1 toggler">
                                        <div class="search__wrapper">
                                            <div class="input-group-prepend input-group-merge">
                                                <input type="text" class="form-control search__field" style="height: 44px;" placeholder="Search" aria-label="Search">
                                                <span class="input-group-text search__icon" style="color: #525f7f;"><i class="fas fa-search"></i></span>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li class="pl-1 mr-1">
                                    <a href="#" class="btn bg-white btn-icon pl-3 pr-3" data-toggle="tooltip" data-placement="top" title="Download data">
                                        <span class="btn-inner--icon"><i class="far fa-save"></i></span>
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
                        <div class="col-4 pl-2 pr-0">
                            <select class="form-control" id="kelas">
                                <option>Semua Kategori</option>
                                <option>Tata Usaha</option>
                                <option>Tool man</option>
                                <option>Kebersihan</option>
                                <option>BKK</option>
                            </select>
                        </div>
                        <div class="col-8 text-left">
                            <ul class="nav justify-content-end">
                                <li>
                                    <button class="btn btn-icon btn-outline-secondary" type="button">
                                        <span class="btn-inner--text">Jumlah : 49</span>
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
                                <th scope="col">Nama</th>
                                <th scope="col">ID</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Amri Lukman Muzaki
                                </th>
                                <td>
                                    24060118140108
                                </td>
                                <td>
                                    L
                                </td>
                                <td>
                                    Tata Usaha
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Amri Lukman Muzaki
                                </th>
                                <td>
                                    24060118140108
                                </td>
                                <td>
                                    L
                                </td>
                                <td>
                                    Tata Usaha
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">
                                    Amri Lukman Muzaki
                                </th>
                                <td>
                                    24060118140108
                                </td>
                                <td>
                                    L
                                </td>
                                <td>
                                    Tata Usaha
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">
                                    Amri Lukman Muzaki
                                </th>
                                <td>
                                    24060118140108
                                </td>
                                <td>
                                    L
                                </td>
                                <td>
                                    Tata Usaha
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">
                                    Amri Lukman Muzaki
                                </th>
                                <td>
                                    24060118140108
                                </td>
                                <td>
                                    L
                                </td>
                                <td>
                                    Tata Usaha
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#" style="background-color: #1174EF;">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fa fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
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
    <!-- jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

    <?= $this->include('user/__partial/js.php') ?>

    <!-- ============================================================== -->
    <!-- End of jQuery - File that you can find on __partial/js.php -->
    <!-- ============================================================== -->

</body>

</html>