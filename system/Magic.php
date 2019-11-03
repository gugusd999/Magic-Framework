<?php 

require_once 'database.php';

class Magic extends Database
{
	
	public function test(){
		echo "string";
	}
	public function getPages($lokasi,$a, $data = ""){
    	require 'aplication/'.$lokasi.'/view/'.$a.'.php';
    }


    function encript($a){
    	$key1 = md5($this->encryp);
    	$key2 = $key1.md5($a);
    	return md5($key2);
    }

    public function shapeSpace_check_https() {
	
		if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
			return true; 
		}
		return false;
	}


    public function base_link($a = "")
    {
    	// get protokol
    	$cekhttps = $this->shapeSpace_check_https();
    	if ($cekhttps == true) {
    		$getProtokol = 'https://';
    		# code...
    	}else{
    		$getProtokol = 'http://';
    	}
		// pangggil hostname
		$getHost = $_SERVER['HTTP_HOST'];
		$getNameApp = $this->namaApss;
		$theLink = $getProtokol.$getHost.'/'.$getNameApp.'/'.$a;
		return $theLink;
    }

    function site_link($a = ""){
    	$cekhttps = $this->shapeSpace_check_https();
    	if ($cekhttps == true) {
    		$getProtokol = 'https://';
    		# code...
    	}else{
    		$getProtokol = 'http://';
    	}
		$getHost = $_SERVER['HTTP_HOST'];
		$getNameApp = $this->namaApss;
		$theLink = $getProtokol.$getHost.'/'.$getNameApp.'/index.php?key='.$a;
		return $theLink;
    }

    function templates($lokasi, $template , $lokasiHalaman="", $halaman = "", $data = "")
    {
    	require 'aplication/'.$lokasi.'/view/'.$template.'.php'; 
    }

    function helper($a){
    	include_once 'helper/'.$a.'.php';
		return new $a;
    }

    function session(){
		session_start();
	}

	function query_cek($x){
		if ($x) {
			return "ok";
		}else{
			return "false";
		}
	}

	function createTable($dataTable = array(), $id="", $class="", $link="", $tableShort = array()){
    	
    	if ($id != "") {
    		$idTable = 'id="'.$id.'"';
    	}else{
    		$idTable = "";
    	}

    	if ($class != "") {
    		$classTable = 'class="'.$class.'"';
    	}else{
    		$classTable = "";
    	}

    	$tablenya = "";

    	foreach ($dataTable as $key => $table) {
			      $tablenya .= "<th>".$table."</th>";          	
        }

        $tablenyash = "";

    	foreach ($tableShort as $key => $tablesh) {
			      
			      if ($key == 0) {
			      	$tablenyash .= $tablesh;          	
			      }else{
			      	$tablenyash .= ",".$tablesh;          	
			      }
        }

    	return '

    		<table '.$idTable.' '.$classTable.' style="width:100%">
		        <thead>
		            <tr>
		                '.$tablenya.'
		            </tr>
		        </thead>
		        <tbody>
		        	
		        </tbody>
		    </table>
		    <script>
		    	$("#'.$id.'").dataTable({
			        scrollX: true,
			        scrollY: true,
			        processing: true,
			        serverSide: true,
			        order: [],
			        ajax: {
			            "url"       : "'.$link.'",
			            "type"      : "POST"
			        },
			        columnDefs:[
			        	{
			        		targets:['.$tablenyash.'],
			        		orderable: false
			        	}
			        ]
			    })
		    </script>

    	';
    }

}

function redirect($a){
	$data = new Settings;

	$getProtokol = stripos(isset($_SERVER['SERVER_PROTOKOL']), 'https') === 0? 'https://' : 'http://';
	// pangggil hostname
	$getHost = $_SERVER['HTTP_HOST'];
	$getNameApp = $data->namaApss;
	$theLink = $getProtokol.$getHost.'/'.$getNameApp.'/index.php?key='.$a;
	header("location: $theLink ");
}


function templater($templater){
	include_once 'templater/'.$templater.'.php';
}