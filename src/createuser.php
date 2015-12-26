<?php

$error = "";

if (isset($_POST["usr"]) && isset($_POST["pwd"])){

	$file = fopen("./files/login.json", "r");
	$line = fgets($file);
	$arr = json_decode($line,true);
	fclose($file);
	
	print_r($arr);
	echo "<br/>";
	
	if (!isset($arr[$_POST["usr"]])){
		
		echo $_POST["usr"];
		if (isset($_POST["usr"])){
			echo "COUCOU";
		}
		
		$usr = $_POST["usr"];
		$pwd = sha1("zztask".$_POST["pwd"]."bcrypt");
		$array = array( $usr => $pwd );
		
		if (isset($arr)){
		$log = array_merge($arr,$array);			// Merges the 2 vars
		}
		else $log = $array;
		
		$file = fopen("./files/login.json", "w");
		if (!$file){
			echo "HEHE";
		}
		print_r($log);
		echo "<br/>ecriture=".fputs($file, json_encode($log));
		fclose($file);
		
		
		$file = fopen("./files/roles.json", "r");
		$line = fgets($file);
		$arr = json_decode($line,true);
		fclose($file);
		$roles = $_POST["roles"];
		
		$array = array( $usr => $roles );
		if (isset($arr)){
		$log = array_merge($arr,$array);			// Merges the 2 vars
		}
		else $log = $array;

		$file = fopen("./files/roles.json", "w");
		fputs($file, json_encode($log));
		fclose($file);
		
		$error = 0;
	
	}
	else $error = 1;
}
else $error = 2;
echo "<br/>test";

if (isset($_POST["pwd"])){
			echo "COUCOU2";
		}
	
	header("Location: admin.php?error=".$error);
	exit();

?>
