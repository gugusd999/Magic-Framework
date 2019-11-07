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

				<div id="<?= $table; ?>-modal" class="modal fade" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Modal title</h4>
				      </div>
				      <form id="">
				      	
				      <div class="modal-body">
				      	<div id="forid">
				      		<input type="hidden" name="id" value="">
				      	</div>
						<div class="form-group">
							<label for="data1">Data 1</label>
							<input type="text" id="data1" class="form-control" name="data1" placeholder="inputkan data 1">
						</div>
						<div class="form-group">
							<label for="data2">Data 2</label>
							<input type="text" id="data2" class="form-control" name="data2" placeholder="inputkan data 2">
						</div>
						<div class="form-group">
							<label for="data3">Data 3</label>
							<input type="text" id="data3" class="form-control" name="keterangan" placeholder="inputkan data 3">
						</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Save changes</button>
				      </div>
				      </form>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			</div>
		</div>
	</div>


	<script>
			
			$(document).click(function(event) {
				var target = $(event.target);
				if (target.is('.hapus')) {
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
					
				}
			});


	</script>


</body>
</html>