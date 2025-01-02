<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-primary">
			<div class="card-body">
				<form action="<?= base_url('telaah-staf/surat-masuk'); ?>" method="POST" enctype="multipart/form-data">
					<?= csrf_field(); ?>

					<input type="hidden" name="surat_masuk_id" value="<?= $surat_masuk->id; ?>">

					<div class="form-group row">
						<label for="dari" class="col-sm-2 col-form-label col-form-label-sm">Dari</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-sm form-control" id="dari" name="dari" placeholder="Masukan Dari..." autocomplete="off" value="<?= old('dari'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="perihal_ts" class="col-sm-2 col-form-label col-form-label-sm">Perihal</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-sm form-control" id="perihal_ts" name="perihal" placeholder="Masukan Perihal.." autocomplete="off" value="<?= old('perihal'); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label col-form-label-sm">I. Dasar</label>
					</div>

					<div class="form-group row">
						<label for="asal_surat" class="col-sm-2 col-form-label col-form-label-sm">Asal Surat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-sm form-control" id="asal_surat" readonly value="<?= $surat_masuk->asal_surat; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="nomor_surat" class="col-sm-2 col-form-label col-form-label-sm">Nomor Surat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-sm form-control" id="nomor_surat" readonly value="<?= $surat_masuk->nomor_surat; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="tanggal_surat" class="col-sm-2 col-form-label col-form-label-sm">Tanggal Surat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-sm form-control" id="tanggal_surat" readonly value="<?= date('d-m-Y', strtotime($surat_masuk->tanggal_surat)); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="perihal" class="col-sm-2 col-form-label col-form-label-sm">Perihal</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-sm form-control" id="perihal" readonly value="<?= $surat_masuk->perihal; ?>">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="summernote_isi">II. Isi</label>
							<textarea name="isi_surat" id="summernote_isi" class="form-control form-control-sm"></textarea>
						</div>

						<div class="form-group col-md-12">
							<label for="summernote_fakta_data">III. Fakta dan Data</label>
							<textarea name="fakta_dan_data" id="summernote_fakta_data" class="form-control form-control-sm"></textarea>
						</div>

						<div class="form-group col-md-12">
							<label for="summernote_saran_tindak">IV. Saran Tindak</label>
							<textarea name="saran_dan_tindak" id="summernote_saran_tindak" class="form-control"></textarea>
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
		$('#summernote_isi').summernote({
			placeholder: 'Masukan Isi Surat..',
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'clear']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
			],
		});

		$('#summernote_fakta_data').summernote({
			placeholder: 'Masukan Fakta dan Data..',
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'clear']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
			]
		});

		$('#summernote_saran_tindak').summernote({
			placeholder: 'Masukan Saran dan Tindak..',
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'clear']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
			]
		});
	});
</script>
<?= $this->endSection(); ?>