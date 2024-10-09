<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<div class="btn-group float-right">
					<ol class="breadcrumb hide-phone p-0 m-0">
						<li class="breadcrumb-item"><a href="<?= base_url('/'); ?>">Dashboard</a></li>
						<li class="breadcrumb-item active"><?= $title; ?></li>
					</ol>
				</div>
				<h3 class="font-weight-bold"><?= $title; ?></h3>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-body">
					<h4 class="mt-0 header-title">Record Data</h4>
					<table id="datatable" class="table table-bordered">
						<thead>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th>Start date</th>
								<th>Salary</th>
							</tr>
						</thead>


						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								<td>$320,800</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<?= $this->endSection(); ?>

			<?= $this->section('script'); ?>
			<script>
				$(document).ready(function() {
					$('#datatable').DataTable();

					//Buttons examples
					var table = $('#datatable-buttons').DataTable({
						lengthChange: false,
						buttons: ['copy', 'excel', 'pdf']
					});

					table.buttons().container()
						.appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
				});
			</script>
			<?= $this->endSection(); ?>