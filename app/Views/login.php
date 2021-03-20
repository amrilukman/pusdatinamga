<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>PUSDATIN AMGA - Login</title>
	<!-- Favicon -->
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="<?= base_url('../assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
	<link rel="stylesheet" href="<?= base_url('../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
	<!-- Page plugins -->
	<!-- Argon CSS -->
	<link rel="stylesheet" href="<?= base_url('../assets/css/argon.css?v=1.2.0') ?>" type="text/css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body class="bg-default">
	<!-- Main content -->
	<div class="main-content">
		<!-- Header -->
		<div class="bg-gradient-info py-7 py-lg-8 pt-lg-1">
		</div>
		<!-- Page content -->
		<div class="container mt--9 pb-2">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7">
					<div class="card bg-secondary border-0 mb-0">
						<div class="card-header bg-transparent">
							<div class="text-muted text-center">
								<img class="my-4" src="../assets/img/brand/pusdatin.png" width="250" height="auto">
							</div>
						</div>
						<div class="card-body px-lg-5 py-lg-5">
							<?php if (!empty(session()->getFlashdata('error'))) : ?>
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<?= session()->getFlashdata('error'); ?>
								</div>
							<?php endif; ?>

							<form method="post" action="<?= base_url('login/auth') ?>" role="form">
								<?php csrf_field(); ?>
								<div class="form-group mb-3">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-email-83"></i></span>
										</div>
										<input class="form-control" id="email" name="email" placeholder="Email/NIP/NISN/ID" type="text" required>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input class="form-control" id="password" name="password" placeholder="Password" type="password" required>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn my-4" style="color: white; background-color: #1174EF">Sign in</button>
								</div>
							</form>
							<div class="text-center">
								<a href="<?php echo site_url('signup') ?>" class="text-light"><small>Create new account</small></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="py-5" id="footer-main">
		<div class="container">
			<div class="align-items-center">
				<div class="copyright text-center text-muted">
					&copy; 2021 <a href="https://www.smkn1amga.sch.id" class="font-weight-bold-info ml-1" target="_blank">SMK N 1 AMPELGADING</a>
				</div>
			</div>
		</div>
	</footer>
	<!-- Argon Scripts -->
	<!-- Core -->
	<script src="<?= base_url('../assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
	<script src="<?= base_url('../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('../assets/vendor/js-cookie/js.cookie.js') ?>"></script>
	<script src="<?= base_url('../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ?>"></script>
	<script src="<?= base_url('../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ?>"></script>
	<!-- Argon JS -->
	<script src="<?= base_url('../assets/js/argon.js?v=1.2.0') ?>"></script>
</body>

</html>