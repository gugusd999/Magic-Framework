<div class="grid-1">
	<div class="padding-10">
		<div class="card-green">
			<h1>Fungsi Tambahan</h1>
			<hr>
			<p>disini ada beberapa fungsi tambah sempat saya gunakan di contoh sebelumnya. yaitu</p>
			<div class="padding-10">
				<ol>
					<li> <b>redirect()</b> redirect digunakan untuk melakukan load sebuah halaman secara langsung.</li>
					<li> <b>$this->site_link()</b> mendapatkan link sebuah halaman</li>
					<li> <b>$this->base_link()</b> mendapatkan link sebuah halaman utama aplikasi atau halaman base/ halaman luar. ini berguna saat ingin menggunkan assets</li>
					<li> <b>$this->load()->templater()</b> digunkan untuk menggunkaan php template seperti php word, php excel, php mpdf yang ada di dalama folder templater, anda bisa menaruh file package dari composer didalam folder ini dan panggil $this->load()->templater('autoload'); </li>
					<li> <b>$this->templates()</b> berfungsi menggunakan tamplate halaman. terdapat 5 parameter  parameter pertama adalah lokasi template, parameter kedua adalah nama template, parameter ke 3 adalah nama folder halaman, parameter ke 4 adalah halamannya, dan parameter terakhir adalah data yang dikirim ke template, dan di halaman template taruh script berikut <b>$this->templates($lokasiHalaman, $halaman, $data); </b></li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		disini saya berikan 1 contoh halaman yang menerapkan semua fungsi diatas click <a class="btn btn-primary" href="<?= $this->site_link("home") ?>">lihat contoh</a>
	</div>
</div>