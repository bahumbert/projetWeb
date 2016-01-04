<?php

$error = "";

	$file = fopen("files/login.json", "r");
	$line = fgets($file);
	$arr = json_decode($line,true);
	fclose($file);
	
	if (!isset($arr[$_POST["user"]])){
		
		$usr = $_POST["usr"];
		$pwd = sha1("zztask".$_POST["pwd"]."bcrypt");
		$array = array( $usr => $pwd );
		$log = array_merge($arr,$array);
		$file = fopen("files/login.json", "w");
		fputs($file, json_encode($log));
		fclose($file);
		
		$file = fopen("files/roles.json", "r");
		$line = fgets($file);
		$arr = json_decode($line,true);
		fclose($file);
		$roles = $_POST["roles"];
		$array = array( $usr => $roles );
		$log = array_merge($arr,$array);
		$file = fopen("files/login.json", "w");
		fputs($file, json_encode($log));
		fclose($file);
		
		$error = 0;
	
	}
	else $error = 1;
	
	header("Location: admin.php?error=".$error);
	exit();

?>
