<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD by Magic</title>
	<link rel="stylesheet" href="<?= $this->base_link('assets/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?= $this->base_link('assets/datatable/dataTables.bootstrap.min.css'); ?>">
</head>
	<script src="<?= $this->base_link() ?>assets/jquery/jquery.js"></script>
	<script src="<?= $this->base_link('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?= $this->base_link(); ?>assets/datatable/jquery.dataTables.min.js"></script>
	<script src="<?= $this->base_link(); ?>assets/datatable/dataTables.bootstrap.min.js"></script>
<body>
    <div class="jumbotron text-center">
    	<h1>welcome to home</h1>
    </div>
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h1>Contoh Datatable</h1>
				<a class="btn btn-primary" href="<?= $this->site_link('home/tambah'); ?>">Tambah Data</a>
				<br>
				<br>
				<!-- maaf karna dia retur htmml harus menggunakan echo :) -->
				
				<?php $table = "contoh"; ?>

				<?= 

					$this->createTable(
						array(
							"no",
							"Nama",
							"Profesi",
							"Keterangan",
							"#"
						),
						$table,
						"table table-bordered",
						"home",
						array(0,3)
					);
		    	 ?>
			</div>
		</div>
	</div>


	<script>
			
			$(document).click(function(event) {
				var target = $(event.target);
				if (target.is('.hapus')) {
						if (confirm('yakin menghapus data ?')) {
						var idtarget = target.attr("data-id");
						$.ajax({
							url: '<?= $this->site_link(); ?>home/hapus',
							type: 'POST',
							dataType: 'text',
							data: {id: idtarget},
						})
						.done(function() {
							<?= $table ?>.ajax.reload();
						})
					} else {
					}
					// Do nothing!
				}
			});


	</script>


</body>
</html>