<?php

/**
 * 
 */
class Admin_sosmed extends Magic
{

	public $table_saya = 'sosmed';
	public $mysosmed = [
			[
				"nama" => "Whatsapp",
				"icon" => "fab fa-whatsapp",
				"url" => "https://api.whatsapp.com/send?phone=",
				"text" => "masukkan nomor whatsapp anda sesuai dengan kode negara <b>62858xxxxxxxx</b>"
			],
			[
				"nama" => "Telegram",
				"icon" => "fab fa-telegram",
				"url" => "https://t.me/",
				"text" => "masukkan username akun telegram anda"
			],
			[
				"nama" => "Facebook",
				"icon" => "fab fa-facebook",
				"url" => "https://facebook.com/",
				"text" => "masukkan username akun facebook anda</b>"
			],
			[
				"nama" => "Github",
				"icon" => "fab fa-github",
				"url" => "https://github.com/",
				"text" => "Masukkan username github anda</b>"
			]
		];

	function __construct(){
		$table = $this->table_saya;
		$struktur = array(
			"sosmed" => "VARCHAR(255)",
			"link" => "VARCHAR(255)",
		);

		// cek table 2 paramater namatable dan struktur table

		$cek = DB::cekTable($table, $struktur);
		if ($cek == 'dibuat' || $cek == 'tersedia') {
			// echo "string";
		}
	}

	public function index(){

		$data["menu"] = "Sosmed";

		$datas = DB::get_table("sosmed");

		$all = [];

		foreach ($this->mysosmed as $key => $value) {
			$ds = $value;
			$ds['link'] = '';
			foreach ($datas as $keys => $values) {
				if ($values['sosmed'] == $value['nama']) {
					$ds['link'] = $values['link'];
				}
			}
			$all[] = $ds;
		}


		$data["sosmed"] = $all;

		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('admin_sosmed', 'view', $data);
	}


	public function setsosmed($id="")
	{
		Session::put('id', $id);
		$datas = DB::get_table("sosmed");
		$all = [];
		foreach ($this->mysosmed as $key => $value) {
			$ds = $value;
			$ds['link'] = '';
			foreach ($datas as $keys => $values) {
				if ($values['sosmed'] == $value['nama']) {
					$ds['link'] = $values['link'];
				}
			}
			$all[] = $ds;
		}
		$datafill = $all;
		$dd = array_filter($datafill, function($x, $y){
				if ($x['nama'] == Session::get('id')) {
					return $x;
				}
		}, ARRAY_FILTER_USE_BOTH);

		$key = array_keys($dd)[0];

		$dd = $dd[$key];

		$data["menu"] = "Sosmed";
		$data["sosmed"] = $id;
		$data["sosmeddata"] = $dd;
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('admin_sosmed', 'update', $data);
	}


	public function simpan()
	{
		$table = $this->table_saya;
		$arr = $_POST['data'];
		$sos = $arr['sosmed'];
		$dd = DB::query_result_array("SELECT * FROM sosmed WHERE sosmed='$sos'");
		if (count($dd) > 0) {
			
			$go = array(
				"sosmed" => $sos
			);

			$simpan = DB::sql_update_query($table, $arr, $go);
			if ($simpan) {
				Session::put('pesan', 'Disimpan');
				redirect('admin_sosmed/setsosmed/'.$sos);
			}
		}else{
			$simpan = DB::sql_save_query($table, $arr);
			if ($simpan) {
				Session::put('pesan', 'Diupdate');
				redirect('admin_sosmed/setsosmed/'.$sos);
			}
		}
	}

	public function del($del='')
	{
		$table = $this->table_saya;

		$go = array(
			"sosmed" => $del
		);
		$hapus = DB::sql_delete_query($table, $go);

		if ($hapus) {
			Session::put('pesan', 'Disimpan');
			redirect('admin_sosmed/setsosmed/'.$del);
		}
	}
}