<?php 
if(!isset($_SESSION)){
    session_start();
}

login(null, null);

function login($usr, $pwd){														// Function for login

	$error = "";

	if((isset($_POST["usr"]) && isset($_POST["pwd"])) || ($usr != null)){		
		
		if(isset($_POST["usr"])){
			$usr = $_POST["usr"];
			$pwd = hash('sha512',"zztask".$_POST["pwd"]."bcrypt");				// Prepares vars
		}
		else {
			$pwd = hash('sha512',"zztask".$pwd."bcrypt");
		}
		$usr = strtolower($usr);
		
		$monfichier = fopen("files/login.json", "r");
		$line = fgets($monfichier);
		$array = json_decode($line,true);										// Gets all users and passwords
		fclose($monfichier);
		
		if(isset($array[$usr]) && $array[$usr] == $pwd){						// If the user exists dans the password is correct
		
			$file_online = "./files/who_is_online.json";
			$file = fopen($file_online, "r");									// We need to know if he is already logged in or not
			$line = fgets($file);
			$arr = json_decode($line,true);
			fclose($file);
				
			if (isset($arr[$usr]) && $arr[$usr] > strtotime('now -15 seconds')){	// If he was logged in during the last 15 seconds
		
				$error = 1;
																					// Then login is rejected
				
			}
			else {
				
				$_SESSION["login"]=$usr;
				setcookie('login',$usr,time()+(3600*24*30));						// Otherwise the user is logged
				
				$monfichier = fopen("files/roles.json", "r");
				$line = fgets($monfichier);
				$array = json_decode($line,true);
				fclose($monfichier);
				
				$_SESSION["role"] = $array[$usr];
				
				header("Location: task.php");
				exit();
			}
		}
		else {
			
			$error = 2;
			header("Location: index.php?error=".$error);							// error incorrect login or password
			exit();
			
		}
	}
	else {
		$error = 0;
	}
	
	header("Location: index.php?error=".$error);
	exit();
	
}
?>

