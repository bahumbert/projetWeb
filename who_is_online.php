<?php session_start();

$file_online = "./files/who_is_online.json";

if (isset($_SESSION["login"])){

	$file = fopen($file_online, "r");
	$line = fgets($file);
	$arr = json_decode($line,true);
	fclose(file);
	
	$usr = $_SESSION['login'];
	$date = date('Y/m/j H:i:s');
	$array = array( $usr => $date );
	if (isset($arr)){
		$log = array_merge($arr,$array);
	}
	else $log = $array;
	
	$file = fopen($file_online, "w");
	fputs($file, json_encode($log));
	fclose($file);
	
}
else echo "Erreur lors de votre login, veuillez contacter votre administrateur système";
?>
