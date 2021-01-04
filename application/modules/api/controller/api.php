<?php

class Api extends Magic{


    public function index()
    {
        $data = [
        	"nama" => "gugus darmayanto"
        ];

        $enc = Str::enc($data);


        $dec = Str::dec($enc);
		echo "<br>";

        var_dump($enc);
		echo "<br>";

        var_dump($dec);

    }


}