<div class="row">
	<div class="col-sm-12">
		<h1>Cara Membuat Halaman Baru</h1>
		<hr>
	</div>
	<div class="col-sm-6 text-center">
		<img style="width: 100%;" src="<?= $this->base_link('assets/icon/createnewpage.png');  ?>" alt="">
	</div>
	<div class="col-sm-6">
		<h2>Membuat Folder Halaman Baru</h2>
		untuk membuat halaman baru kalian cukup membuat folder baru didalam folder modules dan di dalamnya buat 2 folder yaitu controller dan view di dalam controller kalian buat sebua file namanya sama dengan nama halaman dan jangan lupa tambahkan extensi file .php dan di view terserah mau buat nama apasaja namaun jangan lupa extensi filenya .php, untuuk contok bisa kalian lihat seperti pada gambar.
	</div>
</div>
<hr>
<div class="row margin-top-20">
	<div class="col-sm-6 text-center">
		<img style="width: 100%;" src="<?= $this->base_link('assets/icon/classcontroller.png');  ?>" alt="">
	</div>
	<div class="col-sm-6">
		<h2>Konfigurasi Controller Halaman Baru</h2>
		<p>
			untuk membuat controller baru anda cukup buat class baru dengan extends Magic, dan dan membuat function index, function index ini disesuaikan dengan yang ada di setting getFunction, jika getFunction adalah home maka fungsi yang dipanggil pertama dari controller class adalah home namun karna contoh menggunkan indek maka dibuat index, contoh seperti pada gambar
		</p>
	</div>
</div>
<hr>
<div class="row margin-top-20">
	<div class="col-sm-6 text-center">
		<img style="width: 100%;" src="<?= $this->base_link('assets/icon/contoh1.png');  ?>" alt="">
		<br>
		<br>
		<img style="width: 100%;" src="<?= $this->base_link('assets/icon/contoh2.png');  ?>" alt="">
	</div>
	<div class="col-sm-6">
		<h2>Melakukan load view pada controller</h2>
		<p>
			untuk melakukan laod view anda hanya harus menggunakan $this->getPages(), get pages memiliki 3 parameter, parameter pertama adalah nama folder dan kedua adalah nama view dan yang terakhir adalah data. diparameter terakhir ini fungsinya adalah mengirim data dari controller ke dalam view untuk contoh seperti gambar 
		</p>
	</div>
</div>
<div class="row margin-top-20">
	<div class="col-sm-12 text-center">
		<h1>hasil halaman sebagai berikut</h1>
	</div>
	<div class="col-sm-12">
		<img style="width: 100%;" src="<?= $this->base_link('assets/icon/contoh3.png');  ?>" alt="">
	</div>
</div>