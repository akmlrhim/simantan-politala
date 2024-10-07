<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>SIMANTAN | POLITALA</title>
	<meta content="Admin Dashboard" name="description" />
	<meta content="Mannatthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-material-design.min.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/icons.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css" />
</head>


<body class="fixed-left">
	<div id="preloader">
		<div id="status">
			<div class="spinner"></div>
		</div>
	</div>

	<div id="wrapper">

		<div class="left side-menu">
			<button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
				<i class="mdi mdi-close"></i>
			</button>

			<div class="topbar-left">
				<div class="text-center">
					<a href="index.html" class="logo text-light h4">
						SIMANTAN.
					</a>
				</div>
			</div>

			<?= $this->include('layout/sidebar'); ?>

		</div>


		<div class="content-page">
			<div class="content">
				<div class="topbar">
					<nav class="navbar-custom">

						<ul class="list-inline float-right mb-0 mr-3">
							<li class="list-inline-item dropdown notification-list">
								<a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
									aria-expanded="false">
									<img src="<?= base_url(); ?>assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle img-thumbnail">
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
									<!-- item-->
									<div class="dropdown-item noti-title">
										<h5>Welcome</h5>
									</div>
									<a class="dropdown-item" href="#">
										<i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">
										<i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
								</div>
							</li>
						</ul>

						<ul class="list-inline menu-left mb-0">
							<li class="float-left">
								<button class="button-menu-mobile open-left waves-light waves-effect">
									<i class="mdi mdi-menu"></i>
								</button>
							</li>
						</ul>
						<div class="clearfix"></div>
					</nav>
				</div>

				<div class="page-content-wrapper dashborad-v">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-12">
								<div class="page-title-box">
									<div class="btn-group float-right">
										<ol class="breadcrumb hide-phone p-0 m-0">
											<li class="breadcrumb-item"><a href="#">Urora</a></li>
											<li class="breadcrumb-item active">Dashboard</li>
										</ol>
									</div>
									<h4 class="page-title">Dashboard</h4>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

						<!-- end page title end breadcrumb -->
						<div class="row">
							<!-- Column -->
							<div class="col-sm-12 col-md-6 col-xl-3">
								<div class="card bg-danger m-b-30">
									<div class="card-body">
										<div class="d-flex row">
											<div class="col-3 align-self-center">
												<div class="round">
													<i class="mdi mdi-google-physical-web"></i>
												</div>
											</div>
											<div class="col-8 ml-auto align-self-center text-center">
												<div class="m-l-10 text-white float-right">
													<h5 class="mt-0 round-inner">18090</h5>
													<p class="mb-0 ">Visits Today</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card bg-info m-b-30">
									<div class="card-body">
										<div class="d-flex row">
											<div class="col-3 align-self-center">
												<div class="round">
													<i class="mdi mdi-account-multiple-plus"></i>
												</div>
											</div>
											<div class="col-8 text-center ml-auto align-self-center">
												<div class="m-l-10 text-white float-right">
													<h5 class="mt-0 round-inner">562</h5>
													<p class="mb-0 ">New Users</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card bg-success m-b-30">
									<div class="card-body">
										<div class="d-flex row">
											<div class="col-3 align-self-center">
												<div class="round ">
													<i class="mdi mdi-basket"></i>
												</div>
											</div>
											<div class="col-8 ml-auto align-self-center text-center">
												<div class="m-l-10 text-white float-right">
													<h5 class="mt-0 round-inner">7514</h5>
													<p class="mb-0 ">New Orders</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card bg-primary m-b-30">
									<div class="card-body">
										<div class="d-flex row">
											<div class="col-3 align-self-center">
												<div class="round">
													<i class="mdi mdi-calculator"></i>
												</div>
											</div>
											<div class="col-8 ml-auto align-self-center text-center">
												<div class="m-l-10 text-white float-right">
													<h5 class="mt-0 round-inner">$32874</h5>
													<p class="mb-0">Total Sales</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<footer class="footer">
				© 2024 SIMANTAN.
			</footer>
		</div>
	</div>


	<!-- jQuery  -->
	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap-material-design.js"></script>
	<script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/detect.js"></script>
	<script src="<?= base_url(); ?>assets/js/fastclick.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.slimscroll.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.blockUI.js"></script>
	<script src="<?= base_url(); ?>assets/js/waves.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.nicescroll.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

	<!-- App js -->
	<script src="<?= base_url(); ?>assets/js/app.js"></script>

</body>

</html>