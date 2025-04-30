<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('telaah-staf/surat-masuk/' . $telaah_staf->id); ?>" method="POST" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<input type="hidden" name="_method" value="PUT">

					<input type="hidden" name="surat_masuk_id" value="<?= $surat_masuk->id; ?>">

					<div class="form-group row">
						<label for="Dari" class="col-sm-2 col-form-label">Dari</label>
						<div class="col-sm-10">
							<select name="jabatan_id" id="Dari" class="form-control custom-select">
								<option value="" disabled <?= old('jabatan_id', $existing_data->jabatan_id) === null ? 'selected' : ''; ?>>Dari</option>
								<?php foreach ($jabatan as $j) : ?>
									<option value="<?= $j->id; ?>" <?= old('jabatan_id', $existing_data->jabatan_id) == $j->id ? 'selected' : ''; ?>>
										<?= $j->jabatan; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="perihal_ts" class="col-sm-2 col-form-label">Perihal</label>
						<div class="col-sm-10">
							<select class="custom-select" name="klasifikasi_id" id="perihal_ts">
								<option value="" disabled <?= old('klasifikasi_id', $existing_data->klasifikasi_id) === null ? 'selected' : ''; ?>>Pilih Perihal</option>
								<?php foreach ($klasifikasi_surat as $row): ?>
									<option value="<?= $row->id; ?>" <?= old('klasifikasi_id', $existing_data->klasifikasi_id) == $row->id ? 'selected' : ''; ?>>
										<?= $row->nama; ?>
									</option>
								<?php endforeach; ?>
							</select>
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
							<textarea name="isi_surat" id="summernote_isi" class="form-control"><?= old('isi_surat', $telaah_staf->isi_surat); ?></textarea>
						</div>

						<div class="form-group col-md-12">
							<label for="summernote_fakta_data">III. Fakta dan Data</label>
							<textarea name="fakta_dan_data" id="summernote_fakta_data" class="form-control"><?= old('fakta_dan_data', $telaah_staf->fakta_dan_data); ?></textarea>
						</div>

						<div class="form-group col-md-12">
							<label for="summernote_saran_tindak">IV. Saran Tindak</label>
							<textarea name="saran_dan_tindak" id="summernote_saran_tindak" class="form-control"><?= old('saran_dan_tindak', $telaah_staf->saran_dan_tindak); ?></textarea>
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
			]
		});

		$('#summernote_fakta_data').summernote({
			placeholder: 'Masukan Fakta dan Data..',
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'clear']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
			],
			tableClassName: function() {
				$(this).addClass('table table-bordered')
					.attr('cellpadding', 12)
					.attr('cellspacing', 0)
					.attr('border', 1)
					.css('borderCollapse', 'collapse');

				$(this).find('td')
					.css('borderColor', '#ccc')
					.css('padding', '15px');
			}
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