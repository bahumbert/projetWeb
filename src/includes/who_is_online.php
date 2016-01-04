<?php

function who_is_online($file){

	$return = array();

	$monfichier = fopen($file, "r");
	$line = fgets($monfichier);
	$array = json_decode($line,true);
	fclose($monfichier);
	
	foreach ($array as $user => $date){
		 if ($date > time()-15){
			 $return[] = $user;
		 }
	}
	
	echo time()-15;
	
	print_r($return);
	
	return $return;	
}

?>
