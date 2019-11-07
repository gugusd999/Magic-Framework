<?php

class i_setting extends Magic{

    function index()
    {
        $data["menu"] = "Setting";
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('i_setting', 'i_setting', $data);
    }


}