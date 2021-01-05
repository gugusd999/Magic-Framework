<?php 

header("Access-Control-Allow-Origin: *");

require_once 'system/Magic.php';

$seturi = new Magic();

$uri = $_SERVER["REQUEST_URI"];

if (isset($uri)) {
	$getUri = $uri;
	$expUri = [];
	$aes = explode("/", $getUri);
	if ($seturi->namaApss != "") {
		$aes = explode($seturi->namaApss, $getUri);
	}

	foreach($aes as $key => $val){
 		if($key != 0){
 			if ($seturi->namaApss != "") {
 				$expUri = explode("/", $val);
 			}else{
 				$expUri[] = $val;
 			}
 		}
	}
	if (isset($expUri[0]) && $expUri[0] != "") {
		$getClass = $expUri[0];
		unset($expUri[0]);
	}
	if (isset($expUri[1])) {
		if ($expUri[1] != "") {
			$getFunction = $expUri[1];
		}
		unset($expUri[1]);
	}
	if (isset($expUri)) {
		$getParams = $expUri;
	}
}


include_once 'application/modules/'.$getClass.'/controller/'.$getClass.'.php';

$x = $getClass;
$a = new $x();
$b = $getFunction;
$c = $getParams;

$ckdbn = new Settings;

if ($ckdbn->host != "" && $ckdbn->user != "") {
	$loadApps = new DB();
	$loadAppsCek = $loadApps->cekDatbase();
	if ($loadAppsCek == 'dibuat' || $loadAppsCek == 'tersedia') {
		call_user_func_array(array($a, $b), $c);
	}else{
		include_once 'system/error.php';
	}
}else{
		call_user_func_array(array($a, $b), $c);
}

