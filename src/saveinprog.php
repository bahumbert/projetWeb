<?php
	$data = file_get_contents("php://input");
	$monfichier = fopen("files/inprog.json", "w");
	fputs($monfichier,$data);
	fclose($monfichier);
?>