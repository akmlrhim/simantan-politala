<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="mb-3">
			<a href="<?= base_url('surat-masuk'); ?>" class="btn btn-secondary btn-sm">Kembali</a>
			<a href="<?= base_url('surat-masuk'); ?>" class="btn btn-warning btn-sm">Cetak</a>
		</div>

		<div class="card">
			<div class="card-body">
				<iframe src="<?= base_url('surat-masuk/telaah-staf/pdf/'  . $telaah_staf->surat_masuk_id); ?>" frameborder="0" width="100%" height="500"></iframe>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection(); ?>