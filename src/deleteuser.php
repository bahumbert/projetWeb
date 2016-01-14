<?php

deleteuser(null);

function deleteuser($user){

	$error = "";

	if (isset($_GET["user"]) || $user != null ){

		if(isset($_GET["user"])){
			$user = $_GET["user"];
		}
		
		$user = strtolower($user);
		
		$file = fopen("./files/login.json", "r");
		$line = fgets($file);
		$arr = json_decode($line,true);
		fclose($file);
		
		if (isset($arr[$user])){
					
			unset($arr[$user]);
			
			print_r($arr);
			
			$file = fopen("./files/login.json", "w");
			if (!$file){
				echo "HEHE";
			}
			echo "<br/>ecriture=".fputs($file, json_encode($arr));
			fclose($file);
			
			
			$error = 4;
		
		}
		else $error = 5;
	}
	else $error = 6;
	
	echo $error;
		
	header("Location: admin.php?error=".$error);
	exit();
		
}

?>
