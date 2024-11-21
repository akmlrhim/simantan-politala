<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">

			<!-- breadcrumb -->
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4><?= $title; ?></h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									<?= $title; ?>
								</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>


			<!-- content here  -->
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="" />
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back
							<div class="weight-600 font-30 text-blue">Johnny Brown!</div>
						</h4>
						<p class="font-18 max-width-600">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
							hic non repellendus debitis iure, doloremque assumenda. Autem
							modi, corrupti, nobis ea iure fugiat, veniam non quaerat
							mollitia animi error corporis.
						</p>
					</div>
				</div>
			</div>

			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">75</div>
								<div class="font-14 text-secondary weight-500">
									Appointment
								</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf">
									<i class="icon-copy dw dw-calendar1"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark">75</div>
								<div class="font-14 text-secondary weight-500">
									Appointment
								</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf">
									<i class="icon-copy dw dw-calendar1"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection(); ?>