<?php
	$monfichier = fopen("files/login.json", "r");
	$line = fgets($monfichier);
	$arr = json_decode($line,true);
	fclose($monfichier);
	$usr = $_POST["usr"];
	$pwd = sha1($_POST["pwd"]);
	$array = array( $usr => $pwd );
	$log = array_merge($arr,$array);
	$monfichier = fopen("files/login.json", "w");
	fputs($monfichier, json_encode($log));
	fclose($monfichier);
?>
