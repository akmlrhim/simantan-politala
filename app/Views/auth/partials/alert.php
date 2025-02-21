<?php if (session()->getFlashdata('error')): ?>
	<div class="alert alert-danger">
		<?= session()->getFlashdata('error'); ?>
	</div>
<?php endif; ?>