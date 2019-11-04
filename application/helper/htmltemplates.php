<?php 


/**
 * 
 */
class htmltemplates extends Magic
{
	
	function loadtemplates($halamn, $view, $data = "")
	{
		return $this->templates('Template', 'Template_01', $halamn, $view, $data);
	}

	function test(){
		echo "ok";
	}
}