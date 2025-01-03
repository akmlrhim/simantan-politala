<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content">
	<div class="container-fluid">
		<div class="d-flex justify-content-end">
			<a href="<?= base_url('surat-keluar/tambah'); ?>" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive-sm">
					<table class="table table-bordered text-center table-sm" id="tables" style="width: 100%;">
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


<!-- modal konfirmasi hapus  -->
<?php foreach ($surat_keluar as $row) : ?>
	<div class="modal fade" id="modal<?= $row->id; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header justify-content-center">
					<h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<i class="fas fa-info-circle text-danger mb-4" style="font-size: 70px;"></i>
					<p>Apakah anda yakin untuk menghapus <?= $row->nomor_surat; ?> ?</p>
					<form action="<?= base_url('surat-keluar/' . $row->id); ?>" method="POST">
						<?= csrf_field(); ?>
						<div class="modal-footer justify-content-center">
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" class="btn btn-danger">Ya</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>


<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
	$(function() {
		$("#tables").DataTable({
			responsive: true,
			lengthChange: true,
			processing: true,
			serverSide: true,
			ajax: '<?= base_url('surat-keluar/show'); ?>',
			order: [],
			columns: [{
					data: 'no',
					orderable: false
				},
				{
					data: 'nomor_surat'
				},
				{
					data: 'klasifikasi_surat'
				},
				{
					data: 'tanggal_surat'
				},
				{
					data: 'file',
					orderable: false
				}, {
					data: 'action',
					orderable: false
				}
			]
		});
	});

	$('#fileModal').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget);
		var fileUrl = button.data('file');

		var modal = $(this);
		modal.find('#modalIframe').attr('src', fileUrl);
	});

	$('#fileModal').on('hidden.bs.modal', function() {
		$(this).find('#modalIframe').attr('src', '');
	});
</script>
<?= $this->endSection(); ?>