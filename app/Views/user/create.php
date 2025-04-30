<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('user/tambah'); ?>" method="POST" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<div class="form-group row">
						<label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap" autocomplete="off" value="<?= old('nama_lengkap'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="nip" class="col-sm-2 col-form-label">NIP</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP" autocomplete="off" value="<?= old('nip'); ?>">
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
						<div class="col-sm-10">
							<div class="input-group">
								<input
									type="password"
									class="form-control"
									id="password"
									name="password"
									placeholder="Masukan Password"
									autocomplete="off"
									value="<?= old('password'); ?>">
							</div>
							<div class="form-check mt-2">
								<input
									class="form-check-input"
									type="checkbox"
									id="showPassword"
									style="cursor: pointer;">
								<label class="form-check-label text-xs" for="showPassword">
									Tampilkan Password
								</label>
							</div>
						</div>
					</div>


					<div class="form-group row">
						<label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-10">
							<select class="custom-select" id="jabatan" name="jabatan_id">
								<option value="" <?= old('jabatan_id') === '' ? 'selected' : '' ?>>-- Pilih Jabatan --</option>
								<?php foreach ($jabatan as $row => $key) : ?>
									<option value="<?= $key->id; ?>" <?= old('jabatan_id') === $key->id ? 'selected' : '' ?>><?= $key->jabatan; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>


					<div class="form-group row">
						<label for="role" class="col-sm-2 col-form-label">Role</label>
						<div class="col-sm-10">
							<select class="custom-select" id="role" name="role">
								<option value="" <?= old('role') === '' ? 'selected' : '' ?>>-- Pilih Role --</option>
								<option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
								<option value="ketua_jurusan" <?= old('role') === 'ketua_jurusan' ? 'selected' : '' ?>>Ketua Jurusan</option>
								<option value="direktur" <?= old('role') === 'direktur' ? 'selected' : '' ?>>Direktur</option>
							</select>
						</div>
					</div>

					<div class="form-group row align-items-center">
						<label for="customFile" class="col-sm-2 col-form-label">Upload Foto Profil (Opsional)</label>
						<div class="col-sm-10">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="foto">
								<label class="custom-file-label" for="customFile">Choose file</label>
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