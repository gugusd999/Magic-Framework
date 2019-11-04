<?php 

header("Access-Control-Allow-Origin: *");

require_once 'system/Magic.php';

if (isset($_GET['key'])) {
	$getUri = $_GET['key'];
	$expUri = explode("/", $getUri);
	if (isset($expUri[0])) {
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






$loadApps = new Database();

$loadAppsCek = $loadApps->cekDatbase();

if ($loadAppsCek == 'dibuat' || $loadAppsCek == 'tersedia') {
	call_user_func_array(array($a, $b), $c);
}else{
	echo "anda tidak terhubung ke database";
}


