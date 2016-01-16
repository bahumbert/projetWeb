<?php 
if(!isset($_SESSION)){
    session_start();
}

login(null, null);

function login($usr, $pwd){

	$error = "";

	if((isset($_POST["usr"]) && isset($_POST["pwd"])) || ($usr != null)){
		
		if(isset($_POST["usr"])){
			$usr = $_POST["usr"];
			$pwd = sha1("zztask".$_POST["pwd"]."bcrypt");
		}
		else {
			$pwd = sha1("zztask".$pwd."bcrypt");
		}
		$usr = strtolower($usr);
		
		$monfichier = fopen("files/login.json", "r");
		$line = fgets($monfichier);
		$array = json_decode($line,true);
		fclose($monfichier);
		
		if(isset($array[$usr]) && $array[$usr] == $pwd){
		
			$file_online = "./files/who_is_online.json";
			$file = fopen($file_online, "r");
			$line = fgets($file);
			$arr = json_decode($line,true);
			fclose($file);
				
			if (isset($arr[$usr]) && $arr[$usr] > strtotime('now -15 seconds')){
		
				$error = 1;
				//header("Location: index.php?error='".$error."'");
				//exit();
				
			}
			else {
				
				$_SESSION["login"]=$usr;
				setcookie('login',$usr,time()+(3600*24*30));
				
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
			header("Location: index.php?error=".$error);
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

