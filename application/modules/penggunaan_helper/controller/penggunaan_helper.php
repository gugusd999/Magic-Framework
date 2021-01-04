<?php 

/**
 * 
 */
class penggunaan_helper extends Magic
{
	function index()
	{
		$data["menu"] = "Menggunakan Helper";
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('penggunaan_helper', 'penggunaan_helper', $data);
	}
}