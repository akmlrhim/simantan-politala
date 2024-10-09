<div class="sidebar-inner slimscrollleft" id="sidebar-main">
	<div id="sidebar-menu">
		<ul>
			<li>
				<a href="<?= base_url('/'); ?>" class="waves-effect">
					<i class="fa-solid fa-house"></i>
					<span> Dashboard </span>
				</a>
			</li>

			<li class="has_sub">
				<a href="javascript:void(0);" class="waves-effect">
					<i class="fa-solid fa-database"></i>
					<span> Data Master </span>
					<span class="float-right">
						<i class="mdi mdi-chevron-right"></i>
					</span>
				</a>
				<ul class="list-unstyled">
					<li>
						<a href="<?= base_url('surat_masuk'); ?>">Surat Masuk</a>
						<a href="#">Telaahan Staf</a>
						<a href="<?= base_url('surat_keluar'); ?>">Surat Keluar</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="#" class="waves-effect">
					<i class="fa-solid fa-right-from-bracket text-"></i>
					<span class="text-danger"> Logout </span>
				</a>
			</li>
		</ul>
	</div>
	<div class="clearfix"></div>
</div>