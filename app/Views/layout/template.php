<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?></title>

	<link rel="shortcut icon" href="<?= base_url(); ?>img/pngegg.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>css/cover.css">
	<link rel="stylesheet" href="<?= base_url(); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link " data-toggle="dropdown"><?= session()->get('nama_lengkap') . ' - ' . session()->get('role'); ?>
						<i class="fas fa-user ml-2"> </i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
							<i class="fas fa-sign-out-alt mr-2"></i>Logout
						</a>
						<div class="dropdown-divider"></div>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url('dashboard'); ?>" class="brand-link">
				<img src="<?= base_url('/img/pngegg.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Footwears</span>
			</a>

			<div class="hr"></div>


			<?= $this->include('layout/sidebar'); ?>


		</aside>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-md-6">
							<h1 class="m-0"><?= $judul; ?></h1>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
								<li class="breadcrumb-item active"><?= $judul; ?></li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>

			<?= $this->renderSection('content'); ?>
		</div>

		<footer class="main-footer mt-2">
			<div class="float-right d-none d-sm-inline">
				Footwears - 2023
			</div>
			<strong>Copyright &copy; 2023</strong> Footwears All rights reserved.
		</footer>
	</div>

	<script src="<?= base_url('js'); ?>/jquery.min.js"></script>
	<script src="<?= base_url('js'); ?>/jquery.mask.min.js"></script>
	<script src="<?= base_url('js'); ?>/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('js'); ?>/adminlte.min.js"></script>


	<script src="<?= base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url(); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

	<?= $this->renderSection('script'); ?>


</body>

</html>