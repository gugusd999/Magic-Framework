<div class="row">
	<div class="col-sm-6">
		<h3>Update Email</h3>
		<p>Pengaturan website anda</p>
	</div>
	<div class="col-sm-6">
		<ol class="breadcrumb pull-right">
		  <li><a href="<?= $this->site_link("admin_setting") ?>">Setting</a></li>
		  <li class="active">Email</li>
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
		<form action="<?= $this->site_link('admin_setting/simpan'); ?>" method="post" enctype="multipart/formdata">
			<input type="hidden" name="nama" value="<?= $data['nama'] ?>">
			<div class="form-group">
				<label for="">Email</label>
				<input name="data[email]" type="email" class="form-control" placeholder="Inputkan alamat emial" value="<?= Str::cek('email', 'email'); ?>">
			</div>
			<div class="form-group">
				<label for="">Secure</label>
				<input name="data[secure]" type="text" class="form-control" placeholder="Inputkan SMTP secure exp tls" value="<?= Str::cek('email', 'secure'); ?>">
			</div>
			<div class="form-group">
				<label for="">Host</label>
				<input name="data[host]" type="text" class="form-control" placeholder="Inputkan host" value="<?= Str::cek('email', 'host'); ?>">
			</div>
			<div class="form-group">
				<label for="">Port</label>
				<input name="data[port]" type="text" class="form-control" placeholder="Inputkan port" value="<?= Str::cek('email', 'port'); ?>">
			</div>
			<div class="form-group">
				<label for="">Username</label>
				<input name="data[username]" type="username" class="form-control" placeholder="Inputkan username" value="<?= Str::cek('email', 'username'); ?>">
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input name="data[password]" type="password" class="form-control" placeholder="Inputkan password" value="<?= Str::cek('email', 'password'); ?>">
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