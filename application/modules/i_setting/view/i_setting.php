<div class="row">
	<div class="col-sm-12 text-center">
		<h1>Setting</h1>
	</div>
	<div class="col-sm-12">
		<div class="grid-3">
			<div class="padding-10">
				<div class="card-green">
					<h3>namaApps</h3>
					<hr>
					<p>
						namaApp adalah nama aplikasi kita, jadi jika alikasi kalian ada di dalam folder htdoc maka <b>$namaApp diisi dengan nama folder</b> aplikasi kalian, namun jika ada di dalam folder maka <b>  $namaApp diisi dengan 'namafolder/namafolderalikasi'</b>  
					</p>
				</div>
			</div>
			<div class="padding-10">
				<div class="card-blue">
					<h3>host</h3>
					<hr>
					<p>
						host adalah nama dari hostname dari server kalian bisanya defaultnya adalah localhost, atau sesuai dengan settingan yang kalian buat  
					</p>
				</div>
			</div>
			<div class="padding-10">
				<div class="card-green">
					<h3>user</h3>
					<hr>
					<p>
						user diisi dengan nama username dari server kalian biasanya defaultnya adalah root jika kalian menggunakan XAMPP, atau sesuaikan dengan settingan milik kalian  
					</p>
				</div>
			</div>
			<div class="padding-10">
				<div class="card-blue">
					<h3>pass</h3>
					<hr>
					<p>
						pass diisi dengan password dari server kalian biasanya defaultnya adalah kosong jika kalian menggunakan XAMPP, atau sesuaikan dengan settingan milik kalian  
					</p>
				</div>
			</div>
			<div class="padding-10">
				<div class="card-green">
					<h3>db</h3>
					<hr>
					<p>
						db diisi dengan nama dari database yang akan digunakan, disini anda tidak perlu membuat dulu databasennya karna ketika aplikasi dijalankan diakan membuat database dengan nama sesuai dengan apa yang kalian isi di db
					</p>
				</div>
			</div>
			<div class="padding-10">
				<div class="card-blue">
					<h3>encryp</h3>
					<hr>
					<p>
						encryp disini berfungsi untuk membuat enkripsi saat anda ingin membuat password login dan cara penggunaannya cukup panggil <b>$this->encript(string)</b>
					</p>
				</div>
			</div>
			<div class="padding-10">
				<div class="card-green">
					<h3>getClass</h3>
					<hr>
					<p>
						getClass diisi dengan nama dari halaman utama/ halaman yang pertama kali diload yanga ada di folder application/modules
					</p>
				</div>
			</div>
			<div class="padding-10">
				<div class="card-blue">
					<h3>getFunction</h3>
					<hr>
					<p>
						getFunction adalah fungsi yang akan diload di dalam class halaman yang dipanggil oleh getClass
					</p>
				</div>
			</div>
			<div class="padding-10">
				<div class="card-green">
					<h3>getParams</h3>
					<hr>
					<p>
						getParams merupakan parameter dari getFunction
					</p>
				</div>
			</div>
		</div>
	</div>
</div>