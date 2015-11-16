<?php

function list_all_user($file){

	$monfichier = fopen($file, "r");
	$line = fgets($monfichier);
	$array = json_decode($line,true);
	fclose($monfichier);
	
	return $array;	
}

?>
