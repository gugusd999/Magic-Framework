<?php 


/**
 * 
 */
class fungsi_lain extends Magic
{
	
	function index()
	{
		$data["menu"] = "Fungsi Tambahan";
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('fungsi_lain', 'view', $data);
	}
}