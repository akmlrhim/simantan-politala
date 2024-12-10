<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('klasifikasi-surat/' . $kl_surat->id); ?>" method="POST">
					<?= csrf_field(); ?>
					<input type="hidden" name="_method" value="PUT">
					<div class="form-group row">
						<label for="kode" class="col-sm-2 col-form-label">Kode</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan Kode" autocomplete="off" value="<?= old('kode', $kl_surat->kode); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="nama" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" autocomplete="off" value="<?= old('nama', $kl_surat->nama); ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
						<div class="col-sm-10 input-group">
							<textarea name="keterangan" class="form-control" id="keterangan" placeholder="Masukan Keterangan (Opsional)"><?= old('keterangan', $kl_surat->keterangan); ?></textarea>
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