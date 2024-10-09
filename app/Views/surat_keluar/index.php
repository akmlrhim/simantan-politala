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
</div>


<?= $this->endSection(); ?>