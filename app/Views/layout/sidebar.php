<div class="sidebar">

	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
			<img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="info">
			<a href="#" class="d-block">Alexander Pierce</a>
		</div>
	</div>

	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

			<li class="nav-item">
				<a href="<?= base_url('dashboard'); ?>" class="nav-link">
					<i class="nav-icon fas fa-tachometer-alt"></i>
					<p>Dashboard</p>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link ">
					<i class="nav-icon fas fa-file-alt"></i>
					<p>
						Data Master
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview" id="dropwdown">
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Surat Keluar</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Telaah Staf</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Surat Masuk</p>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item">
				<a href="<?= base_url('user'); ?>" class="nav-link">
					<i class="nav-icon fas fa-user"></i>
					<p>User</p>
				</a>
			</li>

			<li class="nav-item">
				<a href="<?= base_url('dashboard'); ?>" class="nav-link">
					<i class="nav-icon fas fa-envelope"></i>
					<p>Disposisi</p>
				</a>
			</li>

			<li class="nav-item">
				<a href="<?= base_url('auth/logout'); ?>" class="nav-link">
					<i class="nav-icon fas fa-sign-out-alt"></i>
					<p>Logout</p>
				</a>
			</li>
		</ul>
	</nav>
</div>