<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content">
	<div class="container-fluid">
		<a href="<?= base_url('user/tambah'); ?>" class="btn btn-primary mb-3"><i class="fas fa-plus-circle mr-2"></i>
			Tambah Data
		</a>

		<?= session()->getFlashdata('pesan') ? '<div class="alert alert-success alert-dismissible fade show" role="alert" id="pesan">' . session()->getFlashdata('pesan') . '</div>' : '' ?>

		<div class="card">
			<div class="card-body">
				<div class="table-responsive-sm">
					<table class="table table-bordered text-center table-sm" id="tables" style="width: 100%;">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama Lengkap</th>
								<th scope="col">Email</th>
								<th scope="col">Username</th>
								<th scope="col">Role</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<!-- data ditampilkan melalui sideserver -->
						</tbody>
					</table>
				</div>
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
			ajax: '<?= base_url('user/show'); ?>',
			order: [],
			columns: [{
					data: 'no',
					orderable: false
				},
				{
					data: 'nama_lengkap'
				},
				{
					data: 'email'
				},
				{
					data: 'username'
				},
				{
					data: 'role'
				},
				{
					data: 'action',
					orderable: false
				}
			]
		});
	});

	setTimeout(function() {
		const flashMessage = document.getElementById("pesan");
		if (flashMessage) {
			flashMessage.classList.remove("show");
			flashMessage.classList.add("fade");
			setTimeout(() => flashMessage.remove(), 300);
		}
	}, 2000);
</script>
<?= $this->endSection(); ?>