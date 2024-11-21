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
					<table id="datatable" class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Lengkap</th>
								<th>Email</th>
								<th>Role</th>
								<th>Dibuat pada</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php $no = 1; ?>
						<?php foreach ($user as $u) : ?>
							<tbody>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $u->nama_lengkap ?? 'T'; ?></td>
									<td><?= $u->email ?? 'T'; ?></td>
									<td><?= $u->role ?? 'T'; ?></td>
									<td><?= $u->created_at ?? 'T'; ?></td>
									<td>
										<a href="#" class="btn btn-warning">Edit</a>
										<a href="#" class="btn btn-primary btn-sm rounded">Hapus</a>
									</td>
								</tr>
							</tbody>
						<?php endforeach; ?>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>

</script>
<?= $this->endSection(); ?>