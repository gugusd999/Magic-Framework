<?php 

header("Access-Control-Allow-Origin: *");

header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

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

include_once 'aplication/'.$getClass.'/controller/'.$getClass.'.php';

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


