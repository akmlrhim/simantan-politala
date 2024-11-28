<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title text-sm">Isi Form untuk memperbarui data user yang ada !</h3>
			</div>
			<div class="card-body">
				<form action="<?= base_url('user/' . $user->id); ?>" method="POST">
					<?= csrf_field(); ?>
					<input type="hidden" name="_method" value="PUT">

					<div class="form-group row">
						<label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
						<div class="col-sm-10">
							<input
								type="text"
								class="form-control"
								id="nama_lengkap"
								name="nama_lengkap"
								placeholder="Masukan Nama Lengkap"
								autocomplete="off"
								value="<?= old('nama_lengkap', $user->nama_lengkap) ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email"
								class="form-control"
								id="email" name="email"
								placeholder="Masukan Email"
								autocomplete="off"
								value="<?= old('email', $user->email); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="username" class="col-sm-2 col-form-label">Username</label>
						<div class="col-sm-10">
							<input
								type="text"
								class="form-control"
								id="username"
								name="username"
								placeholder="Masukan Username"
								autocomplete="off"
								value="<?= old('username', $user->username); ?>" />
						</div>
					</div>

					<div class="form-group row">
						<label for="role" class="col-sm-2 col-form-label">Role</label>
						<div class="col-sm-10">
							<select class="form-control" id="role" name="role">
								<option value="<?= $user->role; ?>" <?= old('role') === '' ? 'selected' : '' ?>><?= $user->role; ?></option>
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