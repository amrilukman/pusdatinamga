<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="<?php echo site_url('operator/dashboard') ?>">
                <img src="<?= base_url('../assets/img/brand/pusdatin.png') ?>" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
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
                                            if ($uri->getSegment(2) == 'wali') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/wali/list') ?>">
                            <i class="ni ni-paper-diploma text-default"></i>
                            <span class="nav-link-text">Kelulusan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            $uri = service('uri');
                                            if ($uri->getSegment(2) == 'alumni') {
                                                echo "active";
                                            } ?>" href="<?php echo site_url('operator/alumni/list') ?>">
                            <i class="fas fa-user-graduate text-default"></i>
                            <span class="nav-link-text">Alumni</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>