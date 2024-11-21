<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title><?= $title; ?></title>

	<link
		rel="apple-touch-icon"
		sizes="180x180"
		href="<?= base_url(); ?>template/vendors/images/apple-touch-icon.png" />
	<link
		rel="icon"
		type="image/png"
		sizes="32x32"
		href="<?= base_url(); ?>template/vendors/images/favicon-32x32.png" />
	<link
		rel="icon"
		type="image/png"
		sizes="16x16"
		href="<?= base_url(); ?>template/vendors/images/favicon-16x16.png" />

	<meta
		name="viewport"
		content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>template/vendors/styles/core.css" />
	<link
		rel="stylesheet"
		type="text/css"
		href="<?= base_url(); ?>template/vendors/styles/icon-font.min.css" />
	<link
		rel="stylesheet"
		type="text/css"
		href="<?= base_url(); ?>template/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
	<link
		rel="stylesheet"
		type="text/css"
		href="<?= base_url(); ?>template/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>template/vendors/styles/style.css" />

</head>

<body>
	<?= $this->include('layout/navbar'); ?>

	<?= $this->include('layout/sidebar'); ?>

	<?= $this->renderSection('content'); ?>

	<script src="<?= base_url(); ?>template/vendors/scripts/core.js"></script>
	<script src="<?= base_url(); ?>template/vendors/scripts/script.min.js"></script>
	<script src="<?= base_url(); ?>template/vendors/scripts/process.js"></script>
	<script src="<?= base_url(); ?>template/vendors/scripts/layout-settings.js"></script>
	<script src="<?= base_url(); ?>template/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>template/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url(); ?>template/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url(); ?>template/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>


	<script src="<?= base_url(); ?>/template/vendors/scripts/datatable-setting.js"></script>
</body>

</html>