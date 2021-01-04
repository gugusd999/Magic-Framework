<div class="row">
	<div class="col-sm-12">
		<h3>Update Sosmed</h3>
		<p>aktifkan sosisal media sesuai dengan kebutuhan anda <b>biru nonaktif dan hijau aktif</b> </p>
		<hr>
	</div>
	<?php foreach($data['sosmed'] as $sosmed ) : ?>
	<a href="<?= $this->site_link("admin_sosmed/setsosmed/".$sosmed['nama']); ?>" class="col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 16px;margin-top: 16px;text-decoration: none;">
		<?php if ($sosmed['link'] != ''): ?>
				<div class="card-green text-center">
			<?php else: ?>
				<div class="card-blue text-center">
		<?php endif ?>
			<i class="<?= $sosmed['icon']; ?> fa-ex text-white"></i>
			<p style="text-decoration: none;"><?= $sosmed['nama']; ?></p>
		</div>
	</a>
	<?php endforeach; ?>
</div>
