<div class="row">
	<div class="col-sm-6">
		<h3>Update Profile</h3>
		<p>Pengaturan website anda</p>
	</div>
	<div class="col-sm-6">
		<ol class="breadcrumb pull-right">
		  <li><a href="<?= $this->site_link("admin_setting") ?>">Setting</a></li>
		  <li class="active">Profile</li>
		</ol>
	</div>
	<div class="col-sm-12">
		<hr>
	</div>
	<div class="col-sm-6">
		<?php if (Session::get('pesan') != NULL): ?>
			<div id="pesan" class="card-green text-center" style="margin-bottom: 10px; cursor: pointer;">
				<h3>Berhasil diupdate</h3>
			</div>
		<?php endif ?>
		<?php Session::del('pesan'); ?>
		<form action="<?= $this->site_link('admin_setting/simpan'); ?>" method="get" enctype="multipart/formdata">
			<input type="hidden" name="nama" value="<?= $data['nama'] ?>">
			<div class="form-group">
				<label for="">Nama</label>
				<input name="data[nama]" type="text" class="form-control" placeholder="Inputkan nama" value="<?= Str::cek('profile', 'nama'); ?>">
			</div>
			<div class="form-group">
				<label for="">Telephone</label>
				<input name="data[telephone]" type="text" class="form-control" placeholder="Inputkan nama" value="<?= Str::cek('profile', 'telephone'); ?>">
			</div>
			<div class="form-group">
				<label for="">Alamat</label>
				<textarea name="data[alamat]" class="form-control" id="" rows="3" placeholder="Inputkan alamat"><?= Str::cek('profile', 'alamat'); ?></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info">Update</button>
				<a href="<?= $this->site_link("admin_setting"); ?>" class="btn btn-light">Kembali</a>
				<a href="<?= $this->site_link("admin_setting/del/".$data['nama']); ?>" class="btn btn-danger">Bersihkan</a>
			</div>
		</form>
	</div>
</div>
<script>
	
	$("#pesan").click(function(event) {
		$(this).remove();
	});

</script>