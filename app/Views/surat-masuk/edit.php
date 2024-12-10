<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content text-sm">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('surat-masuk/' . $surat_masuk->id); ?>" method="POST" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<input type="hidden" name="_method" value="PUT">

					<div class="form-group row">
						<label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-sm" id="perihal" name="perihal" placeholder="Masukan Perihal" autocomplete="off" value="<?= old('perihal', $surat_masuk->perihal); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="asal_surat" class="col-sm-2 col-form-label">Asal Surat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-sm" id="asal_surat" name="asal_surat" placeholder="Masukan Asal Surat" autocomplete="off" value="<?= old('asal_surat', $surat_masuk->asal_surat); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-sm" id="nomor_surat" name="nomor_surat" placeholder="Masukan Nomor Surat" autocomplete="off" value="<?= old('nomor_surat', $surat_masuk->nomor_surat); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tanggal</label>
						<div class="col-sm-5">
							<input type="date" class="form-control form-control-sm" id="tanggal_diterima" name="tanggal_diterima" placeholder="Tanggal Diterima" autocomplete="off" value="<?= old('tanggal_diterima', $surat_masuk->tanggal_diterima); ?>" onfocus="this.showPicker()">
							<small class="form-text text-muted">Tanggal Diterima</small>
						</div>
						<div class="col-sm-5">
							<input type="date" class="form-control form-control-sm" id="tanggal_surat" name="tanggal_surat" placeholder="Tanggal Surat" autocomplete="off" value="<?= old('tanggal_surat', $surat_masuk->tanggal_surat); ?>" onfocus="this.showPicker()">
							<small class="form-text text-muted">Tanggal Surat</small>
						</div>
					</div>

					<div class="form-group row align-items-center">
						<label for="customFile" class="col-sm-2 col-form-label">Upload Dokumen</label>
						<div class="col-sm-10">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="file_surat">
								<label class="custom-file-label" for="customFile">Pilih file</label>
							</div>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<a href="<?= base_url('surat-masuk'); ?>" class="btn btn-secondary">Kembali</a>
							<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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