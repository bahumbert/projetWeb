<?php
	$monfichier = fopen("files/login.json", "r");
	$line = fgets($monfichier);
	$array = json_decode($line,true);
	$log = array_merge($arr,$array);

	
	fclose($monfichier);
?>
