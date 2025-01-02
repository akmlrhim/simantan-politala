<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-primary">
			<div class="card-body">
				<form action="<?= base_url('surat-keluar/tambah'); ?>" method="POST">
					<?= csrf_field(); ?>

					<div class="form-group row">
						<label for="nomor_surat" class="col-sm-2 col-form-label col-form-label-sm">Nomor Surat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-sm form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukan Nomor Surat..." autocomplete="off" value="<?= old('nomor_surat'); ?>" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="tgl_surat" class="col-sm-2 col-form-label col-form-label-sm">Tanggal Surat</label>
						<div class="col-sm-10">
							<input type="date" class="form-control-sm form-control" id="tgl_surat" name="tanggal_surat" autocomplete="off" value="<?= old('tanggal_surat'); ?>" onclick="this.showPicker();">
						</div>
					</div>

					<div class="form-group row">
						<label for="perihal" class="col-sm-2 col-form-label col-form-label-sm">Hal</label>
						<div class="col-sm-10">
							<select name="klasifikasi_id" id="perihal" class="form-control custom-select custom-select-sm" required>
								<option value="" disabled selected>Pilih Klasifikasi</option>
								<?php foreach ($klasifikasi as $k) : ?>
									<option value="<?= $k->id; ?>"><?= $k->nama; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="summernote">Isi</label>
							<textarea name="isi" id="summernote" class="form-control form-control-sm"></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<a href="<?= base_url('telaah-staf'); ?>" class="btn btn-secondary">Kembali</a>
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
	$(function() {
		$('#summernote').summernote({
			placeholder: 'Masukan Isi Surat..',
			height: 250,
		});
	});
</script>
<?= $this->endSection(); ?>