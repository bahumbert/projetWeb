<?php

if ((isset($_POST["usr"]) && isset($_POST["pwd"]) && isset($_POST["roles"]))){

	createuser($_POST["usr"], $_POST["pwd"], $_POST["roles"]);
}

function createuser($usr, $pwd, $role){			// Creates new users

	$error = "";

	if ($usr != null && $pwd != null && $role != null){

		$pwd = htmlentities($pwd);
		$pwd = hash('sha512',"zztask".$pwd."bcrypt");
		$usr = htmlentities(strtolower($usr));
		
		$file = fopen(__DIR__."/files/login.json", "r");							// Gets current list of users
		$line = fgets($file);
		$arr = json_decode($line,true);
		fclose($file);
		
		if (!isset($arr[$usr])){											// to look if this user already exist
			
			$array = array( $usr => $pwd );				// If not, then we add the new user
			
			if (isset($arr)){
			$log = array_merge($arr,$array);			// By merging the 2 vars
			}
			else $log = $array;
			
			$file = fopen(__DIR__."/files/login.json", "w");	// Writes down the new user list
			if (!$file){
				echo "HEHE";
			}
			print_r($log);
			echo "<br/>ecriture=".fputs($file, json_encode($log));
			fclose($file);
			
			
			$file = fopen(__DIR__."/files/roles.json", "r");	// Same for his role
			$line = fgets($file);
			$arr = json_decode($line,true);
			fclose($file);
			
			$array = array( $usr => $role );
			if (isset($arr)){
				$log = array_merge($arr,$array);			// Merges the 2 vars
			}
			else $log = $array;

			$file = fopen(__DIR__."/files/roles.json", "w");
			fputs($file, json_encode($log));
			fclose($file);
			
			$error = 0;
		
		}
		else $error = 1;
	}
	else $error = 2;
	
		
	header("Location: ./admin.php?error1=".$error);
	exit();
		
}

?>
