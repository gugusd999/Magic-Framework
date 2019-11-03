<?php 

// --------------------- the action for get it data from URI ---------------//

// panggill protokol
$getProtokol = stripos(isset($_SERVER['SERVER_PROTOKOL']), 'https') === 0? 'https://' : 'http://';
// pangggil hostname
$getHost = $_SERVER['HTTP_HOST'];
// panggil folder apps
$getBaseFolder = $_SERVER['REQUEST_URI'];


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

require_once 'aplication/'.$getClass.'/controller/'.$getClass.'.php';

// --------------------- the action for get it data from URI ---------------//

$myUri = array(
	"theClassName"  => $getClass
	,"theProperties" => array(
		'function'   => $getFunction
		,'parameter' => $getParams
	)
);

$loadApps = new Database();

$loadAppsCek = $loadApps->cekDatbase();

if ($loadAppsCek == 'dibuat' || $loadAppsCek == 'tersedia') {
	call_user_func_array("callback", array($myUri['theClassName'], $myUri['theProperties']));
}else{
	echo "anda tidak terhubung ke database";
}


$new = new landing_page;
$test = $new->home();