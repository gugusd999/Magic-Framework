<?php

class buat_halaman extends Magic{

    function index()
    {
        $data["menu"] = "Buat Halaman";
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('buat_halaman', 'buat_halaman', $data);
    }


}