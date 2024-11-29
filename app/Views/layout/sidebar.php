<div class="sidebar">

	<div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
		<div class="image">
			<img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" class="img-circle elevation-2" alt="User Image" style="width: 40px; height: 40px;">
		</div>
		<div class="info ml-2">
			<a href="#" class="d-block font-weight-bold text-xs"><?= session()->get('nama_lengkap'); ?></a>
			<span class="d-block text-sm">
				<?php
				$role = session()->get('role');
				echo $role === 'direktur' ? '<span class="badge bg-primary">Direktur</span>' : ($role === 'admin' ? '<span class="badge bg-success">Admin</span>' : ($role === 'ketua-jurusan' ? '<span class="badge bg-warning text-dark">Ketua Jurusan</span>' : ''));
				?>
			</span>
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
						<a href="<?= base_url('surat-keluar'); ?>" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Surat Keluar</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('telaah-staf'); ?>" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Telaah Staf</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('surat-masuk'); ?>" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Surat Masuk</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('klasifikasi-surat'); ?>" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Klasifikasi Surat</p>
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
				<a href="<?= base_url('disposisi'); ?>" class="nav-link">
					<i class="nav-icon fas fa-envelope"></i>
					<p>Disposisi</p>
				</a>
			</li>

			<li class="nav-item">
				<a
					href="#"
					class="nav-link"
					onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
					<i class="nav-icon fas fa-sign-out-alt text-danger"></i>
					<p class="text-danger">Logout</p>
				</a>
			</li>

			<form action="<?= base_url('logout'); ?>" method="POST" id="logout-form" class="d-none">
				<?= csrf_field(); ?>
			</form>

		</ul>
	</nav>
</div>