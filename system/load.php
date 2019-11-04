<?php 

class load extends Magic
{
	
	public function helper($data)
	{
		
		require_once 'application/helper/'.$data.'.php';
		return new $data;		
		
	}

	public function templater($templater){
		include_once 'templater/'.$templater.'.php';
	}
	
}