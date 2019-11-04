<?php 

class home extends Magic
{
	
	public $table_saya = 'contoh';
	
	function index()
	{
	
		// ok ini adalah variable untuk nama table terserah mau dinamai apa
		$table = $this->table_saya;
		$struktur = array(
			"id" => "INT(11) AUTO_INCREMENT PRIMARY KEY",
			"data1" => "VARCHAR(255)",
			"data2" => "VARCHAR(255)",
			"keterangan" => "VARCHAR(255)",
		);

		// cek table 2 paramater namatable dan struktur table

		$cek = $this->cekTable($table, $struktur);
		if ($cek == 'dibuat' || $cek == 'tersedia') {
			$this->getPages('home', 'home');
		}

	}

	function show(){
		// nama table
		$table = $this->table_saya;
		
		$search = $_POST["search"]["value"];
		$table_row = array('id', 'data1', 'data2', 'keterangan');
		$dataColumn = array(false,"data1","data2", 'keterangan');
		// sql like db digunakan untuk pencarian table atau filter table rumus ini saya tanamkan di database class
		$table_row_data = $this->sql_like_table($table_row, $search);

		if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ""; endif;

		$order = $this->sql_order_table($dataColumn, $setorder);

		$limitStart = $_POST["start"];
		$limitEnd = $_POST["length"];
		$countData = $this->count_query("SELECT * FROM $table");
		$getData = $this->query_result_object("SELECT * FROM $table WHERE $table_row_data $order LIMIT $limitStart, $limitEnd");
		$dataArr = array();
		$no = intval($_POST['start']);
		foreach ($getData as $key => $value) {
			$no++;
			array_push($dataArr, array(
				$no,
				$value->data1,
				$value->data2,
				$value->keterangan,
				'<a href="'.$this->site_link('home/edit/'.$value->id).'" class="btn btn-success edit">edit</a> 
				<a href="'.$this->site_link('home/hapus/'.$value->id).'" class="btn btn-danger edit">hapus</a>'
			));
		}
		$r = array(
			"draw"            => isset ( $request['draw'] ) ?
                                    intval( $request['draw'] ) :
                                    0,
            "recordsTotal"    => intval( $countData ),
            "recordsFiltered" => intval( $countData ),
            "data"            => $dataArr
		);
		echo json_encode($r);
	}

	// ok kita buat halaman tambah
	function tambah(){
		$this->getPages('home', 'tambah');
	}

	function simpan(){
		$table = $this->table_saya;
		$arr = array(
			"data1" => $_POST['data1'],
			"data2" => $_POST['data2'],
			"keterangan" => $_POST['data3']
		);

		var_dump($arr);

		$simpan = $this->sql_save_query($table, $arr);
		if ($simpan) {
			redirect('home');
		}
	}

	function edit($id){
		$data['id'] = $id;
		$this->getPages('home', 'edit', $data);
	}

	function update(){
		$table = $this->table_saya;
		$arr = array(
			"data1" => $_POST['data1'],
			"data2" => $_POST['data2'],
			"keterangan" => $_POST['data3']
		);

		$go = array(
			"id" => $_POST['id']
		);

		var_dump($arr);

		$simpan = $this->sql_update_query($table, $arr, $go);
		if ($simpan) {
			redirect('home');
		}
	}


	function hapus($id){
		$table = $this->table_saya;

		$go = array(
			"id" => $id
		);
		$hapus = $this->sql_delete_query($table, $go);

		if ($hapus) {
			redirect('home');
		}
	}

}