<?php 


/**
 * 
 */
class Wellcome extends Magic
{

	function index()
	{
		$helper = $this->load()->helper('htmltemplates');
		$helper->loadtemplates('Wellcome', 'Wellcome');
	}
}