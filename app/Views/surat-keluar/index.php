<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-end">
					<a href="<?= base_url('surat-keluar/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
				</div>
				<div class="table-responsive-sm">
					<table class="table table-bordered text-center table-sm text-sm" id="tables" style="width: 100%;">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nomor Surat</th>
								<th scope="col">Perihal</th>
								<th scope="col">Tanggal Surat</th>
								<th scope="col">File</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>