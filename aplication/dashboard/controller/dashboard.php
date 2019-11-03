<?php 

/**
 * 
 */
class dashboard extends Magic
{
	
	function index()
	{
		// ok ini adalah variable untuk nama table terserah mau dinamai apa
		$table = 'crud_gugus';
		$struktur = "
			id INT(11) AUTO_INCREMENT PRIMARY KEY,
			data1 VARCHAR(255),
			data2 TEXT
		";

		// cek table 2 paramater namatable dan struktur table


		$cek = $this->cekTable($table, $struktur);
		if ($cek == 'dibuat' || $cek == 'tersedia') {
			$this->getPages('dashboard', 'view');
		}

	}

	function edit($id){
		$data['id'] = $id;
		$this->getPages('dashboard', 'edit', $data);
	}

	function hapus($id){
		$table = 'crud_gugus';

		$go = array(
			"id" => $id
		);
		$hapus = $this->sql_delete_query($table, $go);

		if ($hapus) {
			redirect('dashboard');
		}
	}

	// ok kita buat halaman tambah
	function tambah(){
		$this->getPages('dashboard', 'tambah');
	}

	function update(){
		$table = 'crud_gugus';
		$arr = array(
			"data1" => $_POST['data1'],
			"data2" => $_POST['data2']
		);

		$go = array(
			"id" => $_POST['id']
		);

		var_dump($arr);

		$simpan = $this->sql_update_query($table, $arr, $go);
		if ($simpan) {
			redirect('dashboard');
		}
	}

	function simpan(){

		$table = 'crud_gugus';
		$arr = array(
			"data1" => $_POST['data1'],
			"data2" => $_POST['data2']
		);

		var_dump($arr);

		$simpan = $this->sql_save_query($table, $arr);
		if ($simpan) {
			redirect('dashboard');
		}
	}

	// nah ok show ini adalah cara menampilkan datatablenya
	// trus gimana gunainnya anda cuma harus merubah beberapa saja
	function show(){
		// nama table
		$table = 'crud_gugus';
		$search = $_POST["search"]["value"];
		$table_row = array('id', 'data1', 'data2');
		$dataColumn = array(false,"data1","data2");
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
				'<a href="'.$this->site_link('dashboard/edit/'.$value->id).'" class="btn btn-success edit">edit</a> 
				<a href="'.$this->site_link('dashboard/hapus/'.$value->id).'" class="btn btn-danger edit">hapus</a>'
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

}