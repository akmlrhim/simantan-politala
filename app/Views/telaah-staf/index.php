<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content">
	<div class="container-fluid">
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
							<!-- data -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>




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
			ajax: '<?= base_url('telaah-staf/surat-masuk/show'); ?>',
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
					data: 'file_surat',
					orderable: false
				},
				{
					data: 'telaah_staf',
					orderable: false
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