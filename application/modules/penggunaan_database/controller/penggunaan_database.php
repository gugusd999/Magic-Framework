<?php 

class penggunaan_database extends Magic
{
	
	function index()
	{
	  	$data["menu"] = "Penggunaan Database";
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('penggunaan_database', 'penggunaan_database', $data);
	}

	function pages($pages)
	{
		$this->getPages('penggunaan_database', $pages);
	}



	function penggunaan_cek_table(){
		
		$nama_tabel = "test";

		$struktur = array(
			"id" => "INT(11) AUTO_INCREMENT PRIMARY KEY",
			"data1" => "VARCHAR(50)",
			"data3" => "VARCHAR(100)",
			"data4" => "VARCHAR(100)",
		);

		$cek = $this->db()->cekTable($nama_tabel, $struktur);

		if ($cek == 'dibuat' || $cek == 'tersedia') {
				redirect('penggunaan_database/penggunaan_cek_table_show');
		}

	}

	function penggunaan_cek_table_show(){
		$queryResult = $this->db()->query_result_object("SELECT * FROM test");
		echo "<a href='".$this->site_link('penggunaan_database/')."'>kembali ke tutorial</a>";
		echo "<br>";
		echo "<a href='".$this->site_link('penggunaan_database/tambah')."'>tambah</a>";
		echo "<table>";
		echo "<tbody>";
			foreach ($queryResult as $key => $value) {
				echo "<tr>
					<td>".$value->data1."</td>
					<td>
						<a href='".$this->site_link('penggunaan_database/edit/'.$value->id)."'>edit</a>
						<a href='".$this->site_link('penggunaan_database/hapus/'.$value->id)."'>hapus</a>
					</td>
					</tr>";
			}
		echo "</tbody>";
		echo "</table>";
	}

	function tambah(){
		$nama_tabel = "test";
		$data = array(
			"data1" => "data no 1",
			"data3" => "data no 2",
		);
		$sql_save = $this->db()->sql_save_query($nama_tabel, $data);
		if ($sql_save) {
			redirect("penggunaan_database/penggunaan_cek_table_show");
		}
	}

	function edit($id){
		$nama_tabel = "test";
		$data = array(
			"data1" => "diubah",
			"data3" => "diubah",
		);
		$go = array(
			"id" => $id
		);
		$sql_save = $this->db()->sql_update_query($nama_tabel, $data, $go);
		if ($sql_save) {
			redirect("penggunaan_database/penggunaan_cek_table_show");
		}
	}



	function hapus($id){
		$nama_tabel = "test";
		$arr = array(
			"id" => $id
		);
		$hapus = $this->db()->sql_delete_query($nama_tabel, $arr);
		if ($hapus) {
			redirect("penggunaan_database/penggunaan_cek_table_show");
		}
	}

}