<?php
	$arr = array('coucou' => "1f71e0f4ac9b47cd93bf269e4017abaab9d3bd63", 'bonjour' =>  "1f71e0f4ac9b47cd93bf269e4017abaab9d3bd63");
	$monfichier = fopen("login.json", "a");
	fputs($monfichier, json_encode($arr));
	print_r ($arr);
	fclose($monfichier);
?>
