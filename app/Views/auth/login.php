<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMANTAN | <?= $title; ?></title>

	<?= csrf_meta(); ?>
	<link rel="shortcut icon" href="<?= base_url(); ?>img/logo_politala.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<b>SIMANTAN</b>
		</div>
		<div class="card">
			<div class="card-body login-card-body">

				<p class="login-box-msg">Silahkan login untuk memulai sesi</p>


				<form action="<?= base_url('authenticate'); ?>" method="POST">
					<?= csrf_field(); ?>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Username" name="username" value="<?= old('username'); ?>" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-at"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input id="password" type="password" class="form-control" placeholder="Password" name="password" value="<?= old('password'); ?>" autocomplete="off">
						<div class="input-group-append">
							<button type="button" class="btn btn-secondary" id="togglePassword">
								<i class="fas fa-eye"></i>
							</button>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block">Login</button>
						</div>
					</div>
				</form>

				<p class="mb-1 mt-3">
					<a href="forgot-password.html">Lupa password?</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center">Belum punya akun, register ?</a>
				</p>
			</div>
		</div>
	</div>

	<script src="<?= base_url('js'); ?>/jquery.min.js"></script>
	<script src="<?= base_url('js'); ?>/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('js'); ?>/adminlte.min.js"></script>
	<script src="<?= base_url(); ?>plugins/toastr/toastr.min.js"></script>


	<script>
		document.getElementById('togglePassword').addEventListener('click', function() {
			const passwordField = document.getElementById('password');
			const icon = this.querySelector('i');
			if (passwordField.type === 'password') {
				passwordField.type = 'text';
				icon.classList.remove('fa-eye');
				icon.classList.add('fa-eye-slash');
			} else {
				passwordField.type = 'password';
				icon.classList.remove('fa-eye-slash');
				icon.classList.add('fa-eye');
			}
		});

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