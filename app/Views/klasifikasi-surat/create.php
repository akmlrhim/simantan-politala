<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content text-sm">
	<div class="container-fluid">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title text-sm">Isi Form untuk Menambahkan Klasifikasi Surat Baru</h3>
			</div>
			<div class="card-body">
				<form action="<?= base_url('klasifikasi-surat/tambah'); ?>" method="POST">
					<?= csrf_field(); ?>
					<div class="form-group row">
						<label for="kode" class="col-sm-2 col-form-label">Kode</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-sm" id="kode" name="kode" placeholder="Masukan Kode" autocomplete="off" value="<?= old('kode'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="nama" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Masukan Nama" autocomplete="off" value="<?= old('nama'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
						<div class="col-sm-10 input-group">
							<textarea name="keterangan" class="form-control form-control-sm" id="keterangan" placeholder="Masukan Keterangan (Opsional)"></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<a href="<?= base_url('klasifikasi-surat'); ?>" class="btn btn-secondary">Kembali</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection(); ?>