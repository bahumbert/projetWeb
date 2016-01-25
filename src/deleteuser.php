<?php

deleteuser(null);

function deleteuser($user){

	$error = "";

	if (isset($_POST["user"]) || $user != null ){

		if(isset($_POST["user"])){
			$user = $_POST["user"];
		}
		
		$user = strtolower($user);
		
		$file = fopen("./files/login.json", "r");
		$line = fgets($file);
		$arr = json_decode($line,true);
		fclose($file);
		
		if (isset($arr[$user])){
			
			$file = fopen("./files/login.json", "w");
			if (!$file){
				$error = 7;
			}
			else {
				
				$file2 = fopen("./files/roles.json", "r");
				$line2 = fgets($file2);
				$arr2 = json_decode($line2,true);
				fclose($file2);
				
				$file2 = fopen("./files/roles.json", "w");
				if (!$file2){
					$error = 7;
				}
				else {
					
					unset($arr[$user]);
					echo "<br/>ecriture=".fputs($file, json_encode($arr));
					fclose($file);
				
					unset($arr2[$user]);
					echo "<br/>ecriture=".fputs($file2, json_encode($arr2));
					fclose($file2);
					$error = 4;
				}
			}
			
		
		}
		else $error = 5;
	}
	else $error = 6;

	header("Location: admin.php?error2=".$error);
	exit();
		
}

?>
