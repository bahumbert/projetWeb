<?php
	$data = file_get_contents("php://input");
	$monfichier = fopen("files/done.json", "w");
	fputs($monfichier,$data);
	fclose($monfichier);
?>