<div class="row">
	<div class="col-sm-6">
		<h3>Update Setting</h3>
		<p>Pengaturan website anda</p>
	</div>
	<div class="col-sm-6">
		<ol class="breadcrumb pull-right">
		  <li class="active"><a href="#">Setting</a></li>
		</ol>
	</div>
	<div class="col-sm-12">
		<hr>
	</div>
	<?php foreach($data['sosmed'] as $sosmed ) : ?>
	<a href="<?= $this->site_link('admin_setting/'.$sosmed['link']) ?>" class="col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 16px;margin-top: 16px;text-decoration: none;">
		<div class="card-blue text-center">
			<i class="<?= $sosmed['icon']; ?> fa-ex text-white"></i>
			<p style="text-decoration: none;"><?= $sosmed['nama']; ?></p>
		</div>
	</a>
	<?php endforeach; ?>
</div>
