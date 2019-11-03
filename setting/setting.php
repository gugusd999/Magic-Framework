<?php 

// this use MSQLI for database and Got The Magic no create db just create db on this sintax

// make better experiens with Magic


class Settings
{
	// namaApps sama dengan nama Folder
	public $namaApss = "Magic-Framework";
	// set yuo host ................:
	public $host = "localhost";
	// set yuo username ................:
    public $user = "root";
	// set yuo password ................:
    public $pass = "";
	// set yuo database ................:
    public $db = "CatatanKeuanganGugus";
    // encripsi
    public $encryp = "awesomeframeworkwithgugus";
}


// setting pages for first load ......................//
// data string
$getClass = "dashboard";
// data string
$getFunction = "index";
// data array
$getParams = array();
