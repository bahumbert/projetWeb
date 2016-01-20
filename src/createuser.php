<?php

createuser(null, null, null);

function createuser($usr, $pwd, $roles){			// Creates new users

	$error = "";

	if ((isset($_POST["usr"]) && isset($_POST["pwd"])) || $usr != null && $pwd != null){

		if(isset($_POST["usr"])){
			$usr = $_POST["usr"];
			$pwd = hash('sha512',"zztask".$_POST["pwd"]."bcrypt");			// Prepares vars
			$roles = $_POST["roles"];
		}
		else {
			$pwd = hash('sha512',"zztask".$pwd."bcrypt");
		}
				
		$usr = strtolower($usr);
		
		$file = fopen("./files/login.json", "r");							// Gets current list of users
		$line = fgets($file);
		$arr = json_decode($line,true);
		fclose($file);
		
		if (!isset($arr[$usr])){											// to look if this user already exist
			
			$array = array( $usr => $pwd );				// If not, then we add the new user
			
			if (isset($arr)){
			$log = array_merge($arr,$array);			// By merging the 2 vars
			}
			else $log = $array;
			
			$file = fopen("./files/login.json", "w");	// Writes down the new user list
			if (!$file){
				echo "HEHE";
			}
			print_r($log);
			echo "<br/>ecriture=".fputs($file, json_encode($log));
			fclose($file);
			
			
			$file = fopen("./files/roles.json", "r");	// Same for his role
			$line = fgets($file);
			$arr = json_decode($line,true);
			fclose($file);
			
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
	
		
	header("Location: admin.php?error=".$error);
	exit();
		
}

?>
