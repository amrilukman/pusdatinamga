<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="<?php echo site_url('operator/dashboard') ?>">
                <img src="<?= base_url('../assets/img/brand/pusdatin.png') ?>" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            $uri = service('uri');
                                            if ($uri->getSegment(2) == 'dashboard') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/dashboard') ?>">
                            <i class="ni ni-tv-2" style="color: #1174EF;"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            $uri = service('uri');
                                            if ($uri->getSegment(2) == 'siswa') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/siswa/list') ?>">
                            <i class="ni ni-hat-3" style="color: #1174EF;"></i>
                            <span class="nav-link-text">Data Siswa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            $uri = service('uri');
                                            if ($uri->getSegment(2) == 'guru') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/guru/list') ?>">
                            <i class="fas fa-chalkboard-teacher" style="color: #1174EF;"></i>
                            <span class="nav-link-text">Data Guru</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            $uri = service('uri');
                                            if ($uri->getSegment(2) == 'pegawai') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/pegawai/list') ?>">
                            <i class="fas fa-briefcase" style="color: #1174EF;"></i>
                            <span class="nav-link-text">Data Pegawai</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            $uri = service('uri');
                                            if ($uri->getSegment(2) == 'jurusan') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/jurusan/list') ?>">
                            <i class="ni ni-atom text-default"></i>
                            <span class="nav-link-text">Jurusan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            $uri = service('uri');
                                            if ($uri->getSegment(2) == 'mapel') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/mapel/list') ?>">
                            <i class="ni ni-books text-default"></i>
                            <span class="nav-link-text">Mata Pelajaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            $uri = service('uri');
                                            if ($uri->getSegment(2) == 'wali') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/wali/list') ?>">
                            <i class="ni ni-single-02 text-default"></i>
                            <span class="nav-link-text">Wali Kelas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            $uri = service('uri');
                                            if ($uri->getSegment(2) == 'alumni') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/alumni/list') ?>">
                            <i class="ni ni-archive-2 text-default"></i>
                            <span class="nav-link-text">Alumni / Kelulusan</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                            <i class="fas fa-print" style="color: #1174EF"></i>
                            <span class="nav-link-text">Print Absen</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>