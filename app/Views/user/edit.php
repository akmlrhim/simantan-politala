<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content text-sm">
	<div class="container-fluid">
		<div class="card card-primary">
			<div class="card-header">1
				<h3 class="card-title text-sm">Isi Form untuk Menambahkan User Baru</h3>
			</div>
			<div class="card-body">
				<form action="<?= base_url('user/' . $user->id); ?>" method="POST" enctype="multipart/form-data">
					<?= csrf_field(); ?>

					<input type="hidden" name="_method" value="PUT">

					<div class="form-group row">
						<label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-sm" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap" value="<?= old('nama_lengkap', $user->nama_lengkap); ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Masukan Email" value="<?= old('email', $user->email); ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group row">
						<label for="username" class="col-sm-2 col-form-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Masukan Username" value="<?= old('username', $user->username); ?>" autocomplete="off">
						</div>
					</div>

					<div class="form-group row">
						<label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-10">
							<select class="form-control form-control-sm" id="jabatan" name="jabatan_id">
								<option value="" disabled>-- Pilih Jabatan --</option>
								<?php foreach ($jabatan as $key) : ?>
									<option value="<?= $key->id; ?>" <?= old('jabatan_id', $user->jabatan_id) == $key->id ? 'selected' : ''; ?>>
										<?= $key->jabatan; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="role" class="col-sm-2 col-form-label">Role</label>
						<div class="col-sm-10">
							<select class="form-control form-control-sm" id="role" name="role">
								<option value="" disabled>-- Pilih Role --</option>
								<option value="Admin" <?= old('role', $user->role) == 'Admin' ? 'selected' : ''; ?>>Admin</option>
								<option value="Ketua Jurusan" <?= old('role', $user->role) == 'Ketua Jurusan' ? 'selected' : ''; ?>>Ketua Jurusan</option>
								<option value="Direktur" <?= old('role', $user->role) == 'Direktur' ? 'selected' : ''; ?>>Direktur</option>
							</select>
						</div>
					</div>

					<div class="form-group row align-items-center">
						<label for="customFile" class="col-sm-2 col-form-label">Upload Foto Profil (Opsional)</label>
						<div class="col-sm-10">
							<div class="custom-file">
								<input type="file" class="custom-file-input form-control-sm" id="customFile" name="foto">
								<label class="custom-file-label" for="customFile"><?= $user->foto ? $user->foto : 'Choose file'; ?></label>
							</div>
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
	document.getElementById('showPassword').addEventListener('change', function() {
		const passwordInput = document.getElementById('password');
		passwordInput.type = this.checked ? 'text' : 'password';
	});

	document.querySelector('.custom-file-input').addEventListener('change', function(e) {
		const fileName = e.target.files[0]?.name || 'Choose file';
		const label = e.target.nextElementSibling;
		label.textContent = fileName;
	});
</script>
<?= $this->endSection(); ?>