		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<span class="nav-link d-flex align-items-center">
						<img
							src="<?= base_url('uploads/foto-profil/' . session()->get('foto')); ?>"
							alt="Foto Profil"
							class="rounded-circle"
							style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
						<div>
							<span class="d-block text-sm"><?= session()->get('username'); ?></span>
							<span class="text-md">
								<?=
								session()->get('role') === 'Admin' ? '<span class="badge badge-danger">Admin</span>'
									: (session()->get('role') === 'Ketua Jurusan' ? '<span class="badge badge-warning">Ketua Jurusan</span>'
										: (session()->get('role') === 'Direktur' ? '<span class="badge badge-success">Direktur</span>'
											: 'Tidak Diketahui'));
								?>
							</span>
						</div>
					</span>
				</li>
			</ul>

		</nav>