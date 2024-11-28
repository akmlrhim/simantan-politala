<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title text-sm">Isi Form untuk Menambahkan User Baru</h3>
			</div>
			<div class="card-body">
				<form action="<?= base_url('user/tambah'); ?>" method="POST">
					<?= csrf_field(); ?>
					<div class="form-group row">
						<label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap" autocomplete="off" value="<?= old('nama_lengkap'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" autocomplete="off" value="<?= old('email'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="username" class="col-sm-2 col-form-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" autocomplete="off" value="<?= old('username'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="password" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10 input-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" autocomplete="off" value="<?= old('password'); ?>">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="button" id="togglePassword">
									<i class="fa fa-eye" id="eyeIcon"></i>
								</button>
							</div>
						</div>
					</div>


					<div class="form-group row">
						<label for="role" class="col-sm-2 col-form-label">Role</label>
						<div class="col-sm-10">
							<select class="form-control" id="role" name="role">
								<option value="" <?= old('role') === '' ? 'selected' : '' ?>>-- Pilih Role --</option>
								<option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
								<option value="ketua-jurusan" <?= old('role') === 'ketua-jurusan' ? 'selected' : '' ?>>Ketua Jurusan</option>
								<option value="direktur" <?= old('role') === 'direktur' ? 'selected' : '' ?>>Direktur</option>
							</select>

						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<a href="<?= base_url('user'); ?>" class="btn btn-secondary">Kembali</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
	document.getElementById('togglePassword').addEventListener('click', function() {
		var passwordField = document.getElementById('password');
		var eyeIcon = document.getElementById('eyeIcon');

		if (passwordField.type === 'password') {
			passwordField.type = 'text';
			eyeIcon.classList.remove('fa-eye');
			eyeIcon.classList.add('fa-eye-slash');

		} else {
			passwordField.type = 'password';
			eyeIcon.classList.remove('fa-eye-slash');
			eyeIcon.classList.add('fa-eye');
		}
	});
</script>
<?= $this->endSection(); ?>