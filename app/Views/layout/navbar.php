		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link " data-toggle="dropdown">
						<i class="fas fa-user ml-2"> </i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
							<i class="fas fa-sign-out-alt mr-2"></i>Logout
						</a>
						<div class="dropdown-divider"></div>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->