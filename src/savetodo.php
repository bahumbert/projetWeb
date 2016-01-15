<?php
	$data = file_get_contents("php://input");
	$monfichier = fopen("files/todo.json", "w");
	fputs($monfichier,$data);
	fclose($monfichier);
?>