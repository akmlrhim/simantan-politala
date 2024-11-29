<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content">
	<div class="container-fluid">
		<a href="<?= base_url('surat-masuk/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data</a>

		<div class="card">
			<div class="card-body">
				<div class="table-responsive-sm">
					<table class="table table-bordered text-center table-sm" id="tables" style="width: 100%;">
						<thead>
							<tr>
								<th scope="col">NO</th>
								<th scope="col">PERIHAL</th>
								<th scope="col">NOMOR SURAT</th>
								<th scope="col">ASAL SURAT</th>
								<th scope="col">TGL DITERIMA</th>
								<th scope="col">TGL SURAT</th>
								<th scope="col">LIHAT DOKUMEN</th>
								<th scope="col">TELAAH STAF</th>
								<th scope="col">AKSI</th>
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
<?php foreach ($surat_masuk as $row) : ?>
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
					<p>Apakah anda yakin untuk menghapus <?= $row->perihal; ?> ?</p>
					<form action="<?= base_url('surat-masuk/' . $row->id); ?>" method="POST">
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

<!-- Modal  file -->
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="fileModalLabel">Lihat Dokumen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe id="modalIframe" style="width: 100%; height: 500px;" frameborder="0"></iframe>
			</div>
		</div>
	</div>
</div>



<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
	$(function() {
		$("#tables").DataTable({
			responsive: true,
			lengthChange: true,
			processing: true,
			serverSide: true,
			ajax: '<?= base_url('surat-masuk/show'); ?>',
			order: [],
			columns: [{
					data: 'no',
					orderable: false
				},
				{
					data: 'perihal'
				},
				{
					data: 'nomor_surat'
				},
				{
					data: 'asal_surat'
				},
				{
					data: 'tanggal_diterima'
				},
				{
					data: 'tanggal_surat'
				},
				{
					data: 'file_surat'
				},
				{
					data: 'file_telaah_staf'
				},
				{
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