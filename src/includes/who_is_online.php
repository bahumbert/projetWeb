<?php 

/****************************************************************************/
/*																			*/
/* This file logs who is online every 15 seconds, through an ajax call		*/
/* 																			*/
/****************************************************************************/

if(!isset($_SESSION)){
    session_start();
}

$file_online = "./files/who_is_online.json";		// The file containing who is online

if (isset($_SESSION["login"])){

	$file = fopen($file_online, "r");				// Gets the current file content first
	$line = fgets($file);
	$arr = json_decode($line,true);					// and puts it in a var
	fclose(file);
	
	$usr = $_SESSION['login'];						
	$date = date('Y/m/j H:i:s');
	$array = array( $usr => $date );				// Creates a var containing the current user and the current date
	if (isset($arr)){
		$log = array_merge($arr,$array);			// Merges the 2 vars
	}
	else $log = $array;
	
	$file = fopen($file_online, "w");
	fputs($file, json_encode($log));				// Replaces the file with the new var
	fclose($file);
	
}
else echo "Erreur lors de votre login, veuillez contacter votre administrateur système";
?>
