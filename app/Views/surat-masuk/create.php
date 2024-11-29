<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title text-sm">Isi Form untuk Menambahkan Surat Masuk</h3>
			</div>
			<div class="card-body">
				<form action="<?= base_url('surat-masuk/tambah'); ?>" method="POST" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<div class="form-group row">
						<label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukan Perihal" autocomplete="off" value="<?= old('perihal'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="asal_surat" class="col-sm-2 col-form-label">Asal Surat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Masukan Asal Surat" autocomplete="off" value="<?= old('asal_surat'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukan Nomor Surat" autocomplete="off" value="<?= old('nomor_surat'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="tanggal_diterima" class="col-sm-2 col-form-label">Tanggal diterima</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" placeholder="Masukan Tanggal diterima" autocomplete="off" value="<?= old('tanggal_diterima'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="tanggal_surat" class="col-sm-2 col-form-label">Tanggal surat</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" placeholder="Masukan Tanggal surat" autocomplete="off" value="<?= old('tanggal_surat'); ?>">
						</div>
					</div>

					<div class="form-group row align-items-center">
						<label for="customFile" class="col-sm-2 col-form-label">Upload Dokumen</label>
						<div class="col-sm-10">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="file_surat">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<a href="<?= base_url('surat-masuk'); ?>" class="btn btn-secondary">Kembali</a>
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
	document.querySelector('.custom-file-input').addEventListener('change', function(e) {
		const fileName = e.target.files[0]?.name || 'Choose file';
		const label = e.target.nextElementSibling;
		label.textContent = fileName;
	});
</script>
<?= $this->endSection(); ?>