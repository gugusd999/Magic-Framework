<?php 
	
	class contoh extends Magic
	{
		
		function index()
		{
			// contoh data dikirim
			$data['nama'] = "gugus darmayanto";
			$this->getPages('contoh', 'halaman_contoh', $data);
		}

		function realisasi_contoh_helper(){
			$helper = $this->load()->helper('contoh_helper');
			$hasil = $helper->tambahAngka(5,5);
			echo $hasil;
		}
	}