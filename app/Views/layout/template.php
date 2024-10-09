<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title><?= $title; ?> | SIMANTAN</title>
	<meta content="Admin Dashboard" name="description" />
	<meta content="Mannatthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-material-design.min.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/icons.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>fa/css/all.min.css" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/font.css">
</head>


<body class="fixed-left">
	<div id="preloader">
		<div id="status">
			<div class="spinner"></div>
		</div>
	</div>

	<div id="wrapper">

		<div class="left side-menu">
			<button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
				<i class="fa-solid fa-x"></i>
			</button>

			<div class="topbar-left">
				<div class="text-center">
					<a href="index.html" class="logo text-light h4 font-weight-bold">
						SIMANTAN.
					</a>
				</div>
			</div>

			<?= $this->include('layout/sidebar'); ?>

		</div>
		<div class="content-page">
			<div class="content">
				<?= $this->include('layout/header'); ?>

				<div class="page-content-wrapper dashborad-v">
					<?= $this->renderSection('content'); ?>
				</div>
			</div>


			<?= $this->include('layout/footer'); ?>
			<footer class="footer">
				© 2024 SIMANTAN.
			</footer>
		</div>
	</div>


	<!-- jQuery  -->
	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap-material-design.js"></script>
	<script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/detect.js"></script>
	<script src="<?= base_url(); ?>assets/js/fastclick.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.slimscroll.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.blockUI.js"></script>
	<script src="<?= base_url(); ?>assets/js/waves.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.nicescroll.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

	<!-- App js -->
	<script src="<?= base_url(); ?>assets/js/app.js"></script>
	<?= $this->renderSection('script'); ?>

</body>

</html>