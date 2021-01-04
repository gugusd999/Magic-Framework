<div class="row">
	<div class="col-sm-6">
		<h3>Update Logo</h3>
		<p>Pengaturan website anda</p>
	</div>
	<div class="col-sm-6">
		<ol class="breadcrumb pull-right">
		  <li><a href="<?= $this->site_link("admin_setting") ?>">Setting</a></li>
		  <li class="active">Logo</li>
		</ol>
	</div>
	<div class="col-sm-12">
		<hr>
	</div>
	<div class="col-sm-12">
		<form action="<?= $this->site_link('admin_setting/simpan/file') ?>" method="post" enctype="multipart/form-data">
			<div class="text-center">
				<img class="img-responsive" style="max-width: 250px; display: inline-block; margin: 10px 0;" src="<?= $this->base_link('assets/logo/logo.png') ?>" alt="" id="preview-gambar">
			</div>
			<div class="form-group">
				<input type="hidden" name="nama" value="<?= Str::cek('nama') ?>">
				<input type="file" onchange="lookimage(this); return false;" name="data" class="form-control" placeholder="inputkan logo" accept="image/*">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">update</button>
			</div>
		</form>
	</div>
</div>

<script>
	function lookimage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e){
                document.getElementById('preview-gambar').setAttribute('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
	}


</script>