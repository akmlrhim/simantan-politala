<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content">
	<div class="container-fluid">

		<div class="card">
			<div class="card-body">
				<h3><strong>Selamat Datang di Sistem Informasi Manajemen Persuratan</strong></h3>
				<p>Sistem ini dibangun untuk mengelola dan memanajemen surat menyurat</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-info"><i class="fas fa-list"></i></span>
					<div class="info-box-content">
						<span class="info-box-number"><?= $kl_surat; ?></span>
						<span class="info-box-text">Klasifikasi Surat</span>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-warning"><i class="fas fa-user"></i></span>
					<div class="info-box-content">
						<span class="info-box-number"><?= $user; ?></span>
						<span class="info-box-text">User</span>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-secondary"><i class="fas fa-user-tie"></i></span>
					<div class="info-box-content">
						<span class="info-box-number"><?= $jabatan; ?></span>
						<span class="info-box-text">Jabatan</span>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-primary"><i class="fas fa-inbox"></i></span>
					<div class="info-box-content">
						<span class="info-box-number"><?= $surat_masuk; ?></span>
						<span class="info-box-text">Surat Masuk</span>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-success"><i class="fas fa-paper-plane"></i></span>
					<div class="info-box-content">
						<span class="info-box-number"><?= $surat_keluar; ?></span>
						<span class="info-box-text">Surat Keluar</span>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-danger"><i class="fas fa-tags"></i></span>
					<div class="info-box-content">
						<span class="info-box-number"><?= $surat_keluar; ?></span>
						<span class="info-box-text">Disposisi</span>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


<?= $this->endSection(); ?>