<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?= $this->base_link("assets/icon/magic.png"); ?>">
    <title>Magic</title>
	<link rel="stylesheet" href="<?= $this->base_link('assets/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?= $this->base_link('assets/datatable/dataTables.bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?= $this->base_link('assets/master-grid/master-grid.css') ?>">	
	<link rel="stylesheet" href="<?= $this->base_link('assets/card/card.css')  ?>">
</head>
	<script src="<?= $this->base_link() ?>assets/jquery/jquery.js"></script>
	<script src="<?= $this->base_link('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?= $this->base_link(); ?>assets/datatable/jquery.dataTables.min.js"></script>
	<script src="<?= $this->base_link(); ?>assets/datatable/dataTables.bootstrap.min.js"></script>
<body>

<div class="container-grid">
	<div class="grid-items bg-black shadow flex-center">
		<span class="title">Magic</span>
	</div>
	<?php $arr = array(
		array(
			"menu" => "Dashboard",
			"icon" => "glyphicon glyphicon-heart",
			"link" => $this->site_link('Wellcome')
		),
		array(
			"menu" => "Setting",
			"icon" => "glyphicon glyphicon-heart",
			"link" => $this->site_link('i_setting')
		),
		array(
			"menu" => "Buat Halaman",
			"icon" => "glyphicon glyphicon-heart",
			"link" => $this->site_link('buat_halaman')
		),
		array(
			"menu" => "Penggunaan Database",
			"icon" => "glyphicon glyphicon-heart",
			"link" => $this->site_link('penggunaan_database')
		),
		array(
			"menu" => "Menggunakan Helper",
			"icon" => "glyphicon glyphicon-heart",
			"link" => $this->site_link('penggunaan_helper')
		),
		array(
			"menu" => "Fungsi Tambahan",
			"icon" => "glyphicon glyphicon-heart",
			"link" => $this->site_link('fungsi_lain')
		)
	); ?>
	<div class="grid-items bg-silver shadow">
		<ol class="nav-menu">
			<?php foreach($arr as $key => $nilai) : ?>
				<?php if($nilai['menu'] == $data['menu']) : ?>
				<li class="active">
					<a class="no-decoration padding-10" href="<?= $nilai["link"]; ?>">
								<i class="<?= $nilai["icon"]; ?>"></i>
								<?= $nilai["menu"]; ?>
					</a>
				</li>
				<?php else : ?>
				<li>
					<a href="<?= $nilai["link"]; ?>">
						<i class="<?= $nilai["icon"]; ?>"></i>
						<?= $nilai["menu"]; ?>
					</a>
				</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ol>
	</div>
	<div class="grid-items padding-16">
		<?php $this->getPages($lokasiHalaman, $halaman, $data); ?>
	</div>
	<div class="grid-items bg-black shadow flex-center">create by gugus darmayanto | ggsd09031997@gmail.com | WA: 0858-000000044
	</div>

</body>
</html>