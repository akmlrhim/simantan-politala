<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('jabatan/tambah'); ?>" method="POST">
					<?= csrf_field(); ?>
					<div class="form-group row">
						<label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukan Jabatan" autocomplete="off" value="<?= old('jabatan'); ?>" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<a href="<?= base_url('jabatan'); ?>" class="btn btn-secondary">Kembali</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection(); ?>