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
    	<h1>CONTOH CRUD</h1>
    </div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h1>Contoh Datatable</h1>
				<a class="btn btn-primary" href="<?= $this->site_link('dashboard/tambah'); ?>">Tambah Data</a>
				<br>
				<br>
				<?= 

					$this->createTable(
						array(
							"no",
							"data1",
							"data2",
							"data3",
							"action"
						),
						"mytable",
						"table table-bordered",
						$this->site_link('dashboard/show'),
						array(0,3)
					);
		    	 ?>
			</div>
		</div>
	</div>
</body>
</html>