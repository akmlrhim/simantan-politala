<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= csrf_meta(); ?>

	<title>SIMANTAN | <?= $title; ?></title>

	<link rel="shortcut icon" href="<?= base_url(); ?>img/logo_politala.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>plugins/toastr/toastr.min.css">


</head>

<body class="sidebar-mini layout-footer-fixed">
	<div class="wrapper">

		<?= $this->include('layout/navbar'); ?>

		<aside class="main-sidebar sidebar-dark-primary elevation-4">

			<?= $this->include('layout/logo'); ?>

			<div class="hr"></div>


			<?= $this->include('layout/sidebar'); ?>

		</aside>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-md-6">
							<h1 class="m-0"><?= $title; ?></h1>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
								<li class="breadcrumb-item active"><?= $title; ?></li>
							</ol>
						</div>
					</div>
				</div>
			</div>

			<?= $this->renderSection('content'); ?>
		</div>

		<?= $this->include('layout/footer'); ?>
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
	<script src="<?= base_url(); ?>plugins/toastr/toastr.min.js"></script>

	<?= $this->renderSection('script'); ?>

	<script>
		<?php if (session()->getFlashdata('toastr')): ?>
			let toastrData = <?= json_encode(session()->getFlashdata('toastr')) ?>;
			toastr.options = {
				"closeButton": true,
				"progressBar": true,
				"timeOut": "3000"
			};
			toastr[toastrData.type](toastrData.message);
		<?php endif; ?>
	</script>
</body>

</html>