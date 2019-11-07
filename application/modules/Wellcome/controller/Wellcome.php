<?php 

class Wellcome extends Magic
{

	function index()
	{
		$data["menu"] = "Dashboard";
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('Wellcome', 'Wellcome', $data);
	}
}