<?php 


/**
 * 
 */
class Admin_setting extends Magic
{
	
	public $table_saya = 'setting';
	public $mysosmed = [
			[
				"nama" => "profile",
				"icon" => "fa fa-user",
				"link" => 'profile',
			],
			[
				"nama" => "logo",
				"icon" => "fab fa-telegram",
				"link" => "logo",
			],
			[
				"nama" => "email",
				"icon" => "fab fa-github",
				"link" => "email",
			]
		];

	function __construct()
	{
		$table = $this->table_saya;
		$struktur = array(
			"nama" => "VARCHAR(255)",
			"data" => "LONGTEXT",
		);

		// cek table 2 paramater namatable dan struktur table

		$cek = DB::cekTable($table, $struktur);
		if ($cek == 'dibuat' || $cek == 'tersedia') {
			// echo "string";
		}
	}


	public function email()
	{
		$data['nama'] = "email";
		$data["menu"] = "Setting";
		$x = DB::query_result_array("SELECT * FROM setting WHERE nama = 'email'");
		if (count($x) > 0) {
			$data['email'] = Str::dec($x[0]['data']);
		}
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('admin_setting', 'email', $data);
	}

	public function profile()
	{
		$data['nama'] = "profile";
		$data["menu"] = "Setting";
		$x = DB::query_result_array("SELECT * FROM setting WHERE nama = 'profile'");
		if (count($x) > 0) {
			$data['profile'] = Str::dec($x[0]['data']);
		}
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('admin_setting', 'profile', $data);
	}

	public function logo()
	{
		$data["nama"] = "logo";
		$data["menu"] = "Setting";
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('admin_setting', 'logo', $data);
	}

	public function index()
	{
		$data["menu"] = "Setting";
		$data["sosmed"] = $this->mysosmed;
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('admin_setting', 'view', $data);
	}

	public function go($nama='')
	{
		foreach ($this->mysosmed as $key => $value) {
			if ($value['nama'] == $nama) {
				redirect('admin_setting/'.$value['link']);
			}
		}	
	}


	public function simpan($type = "")
	{
		$table = $this->table_saya;
		$sos = $_POST['nama'];
		if ($type == "file") {
			$name = "assets/logo/logo.png";
			$tmp = $_FILES['data']['tmp_name'];
			move_uploaded_file($tmp, $name);
			$arr = [
				"nama" => $sos,
				"data" => $name
			];
		}else{
			$arr = [
				"nama" => $sos,
				"data" => Str::enc($_POST['data'])
			];
		}
		$dd = DB::query_result_array("SELECT * FROM setting WHERE nama='$sos'");
		if (count($dd) > 0) {
			
			$go = array(
				"nama" => $sos
			);

			$simpan = DB::sql_update_query($table, $arr, $go);
			if ($simpan) {
				Session::put('pesan', 'Disimpan');
				$this->go($sos);
			}
		}else{
			$simpan = DB::sql_save_query($table, $arr);
			if ($simpan) {
				Session::put('pesan', 'Diupdate');
				$this->go($sos);
			}
		}
	}

	public function del($del='')
	{
		$table = $this->table_saya;
		$go = array(
			"nama" => $del
		);
		$hapus = DB::sql_delete_query($table, $go);
		if ($hapus) {
			Session::put('pesan', 'Disimpan');
			$this->go($del);
		}
	}

}