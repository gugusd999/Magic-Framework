<?php 

/**
 * 
 */
class Session extends Settings
{

	public static function put($name='', $data = '')
	{
		if ($name != '' && $data != '') {
			
			$name = (new self)->encryp.$name;
			$name = md5(md5($name));
			$_SESSION[$name] = $data;
		}
	}
	

	public static function get($name = ''){
		if ($name == '') {
			return $_SESSION;
		}else{
			$name = (new self)->encryp.$name;
			$name = md5(md5($name));
			if (isset($_SESSION[$name])) {
				return $_SESSION[$name];
			}
		}
	}

	public static function del($name = ''){
		if ($name != '') {
			$name = (new self)->encryp.$name;
			$name = md5(md5($name));
			unset($_SESSION[$name]);
		}
	}
}