<div class="row">
	<div class="col-sm-12">
		<h3>Update Sosmed</h3>
		<p>masukkan link sesuai dengan account anda</p>
		<hr>
	</div>
	<div class="col-sm-6">
		<?php if (Session::get('pesan') != NULL): ?>
			<div id="pesan" class="card-green text-center" style="margin-bottom: 10px; cursor: pointer;">
				<h3>Berhasil diupdate</h3>
			</div>
		<?php endif ?>
		<?php Session::del('pesan'); ?>
		<form action="<?= $this->site_link("admin_sosmed/simpan"); ?>" enctype="multipart/formdata" method="post">
			<div class="form-group">
				<label for="">Sosmed</label>
				<input type="text" readonly="" name="data[sosmed]" class="form-control" value="<?= $data['sosmed']; ?>">
			</div>
			<div>
				<p><?= $data['sosmeddata']['text']; ?></p>
			</div>
			<div class="form-group">
				<label for="">Link</label>
				<input type="text" name="data[link]" class="form-control" placeholder="Isikan linknya disini" value="<?= $data['sosmeddata']['link']; ?>">
			</div>
			<div class="form-group">
				<button class="btn btn-info">Simpan</button>
				<a href="<?= $this->site_link("admin_sosmed"); ?>" class="btn btn-light">Kembali</a>
				<a href="<?= $this->site_link("admin_sosmed/del/".$data['sosmed']); ?>" class="btn btn-danger">Bersihkan</a>
			</div>
		</form>
	</div>
	<div class="col-sm-6">
		<div class="card-blue text-center">
			<i class="<?= $data['sosmeddata']['icon']; ?> fa-ex text-white"></i>
			<p style="text-decoration: none;"><?= $data['sosmeddata']['nama']; ?></p>
		</div>
	</div>
</div>

<script>
	
	$("#pesan").click(function(event) {
		$(this).remove();
	});

</script>