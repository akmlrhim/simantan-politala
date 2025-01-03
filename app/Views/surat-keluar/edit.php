<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card card-primary">
			<div class="card-body">
				<form action="<?= base_url('surat-keluar/' . $surat_keluar->id); ?>" method="POST">
					<?= csrf_field(); ?>

					<input type="hidden" name="_method" value="PUT">

					<div class="form-group row">
						<label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukan Nomor Surat..." autocomplete="off" value="<?= old('nomor_surat', $surat_keluar->nomor_surat); ?>" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="tgl_surat" name="tanggal_surat" autocomplete="off" value="<?= old('tanggal_surat', $surat_keluar->tanggal_surat); ?>" onclick="this.showPicker();">
						</div>
					</div>

					<div class="form-group row">
						<label for="perihal" class="col-sm-2 col-form-label">Hal</label>
						<div class="col-sm-10">
							<select name="klasifikasi_id" id="perihal" class="form-control custom-select">
								<option value="" disabled <?= old('klasifikasi_id', $surat_keluar->klasifikasi_id ?? '') === null ? 'selected' : ''; ?>>
									Pilih Perihal
								</option>
								<?php foreach ($klasifikasi as $k) : ?>
									<option value="<?= $k->id; ?>"
										<?= old('klasifikasi_id', $surat_keluar->klasifikasi_id ?? '') == $k->id ? 'selected' : ''; ?>>
										<?= $k->nama; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="summernote">Isi</label>
							<textarea name="isi" id="summernote" class="form-control"><?= old('isi', $surat_keluar->isi); ?></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<a href="<?= base_url('surat-keluar'); ?>" class="btn btn-secondary">Kembali</a>
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