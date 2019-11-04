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
				<h1>Edit Data</h1>
				<hr>
			</div>
			<div class="col-sm-8 col-sm-offset-2">
				<?php $dapatkan_data =  $this->query_result_object_row('SELECT * FROM contoh WHERE id = "'.$data['id'].'"'); ?>
				<form action="<?= $this->site_link('home/update'); ?>" method="post">
					<div class="form-group">
						<label for="data1">Data 1</label>
						<input type="hidden" value="<?= $dapatkan_data->id; ?>" name="id">
						<input type="text" id="data1" class="form-control" value="<?= $dapatkan_data->data1; ?>" name="data1" placeholder="inputkan data 1">
					</div>
					<div class="form-group">
						<label for="data2">Data 2</label>
						<input type="text" id="data2" class="form-control" value="<?= $dapatkan_data->data2 ?>" name="data2" placeholder="inputkan data 2">
					</div>
					<div class="form-group">
						<label for="data3">Data 3</label>
						<input type="text" id="data2" class="form-control" value="<?= $dapatkan_data->keterangan ?>" name="data3" placeholder="inputkan data 3">
					</div>
					<div class="form-group">
						<a type="submit" href="<?= $this->site_link('home'); ?>" class="btn btn-default">kembali</a>
						<button type="submit" class="btn btn-success">simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>