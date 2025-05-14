<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<?= csrf_meta(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMANTAN | <?= $title; ?></title>

	<?= csrf_meta(); ?>
	<link rel="shortcut icon" href="<?= base_url(); ?>img/logo_politala.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>css/adminlte.min.css">

	<style>
		.g-recaptcha {
			width: 100% !important;
			align-items: center;
			transform: scale(1.05);
			transform-origin: 0 0;
		}
	</style>
</head>



<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<b class="text-primary font-weight-bold">Surat POLITALA</b>
		</div>
		<div class="card">
			<div class="card-body login-card-body">

				<p class="login-box-msg">Silahkan login untuk memulai sesi</p>

				<?= $this->include('auth/partials/alert'); ?>

				<form action="<?= base_url('authenticate'); ?>" method="POST">
					<?= csrf_field(); ?>
					<div class="mb-3">
						<input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" placeholder="Username" name="username" value="<?= old('username'); ?>" autocomplete="off">
						<?php if (session('errors.username')): ?>
							<div class="invalid-feedback">
								<?= session('errors.username') ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="mb-3">
						<input id="password" type="password" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" placeholder="Password" name="password" autocomplete="off">
						<?php if (session('errors.password')): ?>
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
						<?php endif; ?>
					</div>
					<!-- <div class="g-recaptcha mb-3" data-sitekey="<?= esc($site_key); ?>"></div> -->

					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>
				</form>

				<p class="mb-1 mt-3">
					<a href="forgot-password.html" class="text-sm">Lupa password?</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center text-sm">Belum punya akun, register ?</a>
				</p>
			</div>
		</div>
	</div>

	<script src="<?= base_url('js'); ?>/jquery.min.js"></script>
	<script src="<?= base_url('js'); ?>/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('js'); ?>/adminlte.min.js"></script>

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</script>
</body>

</html>