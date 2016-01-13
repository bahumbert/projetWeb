<?php 
if(!isset($_SESSION)){
    session_start();
}

login();

function login(){

	$error = "";

	if(isset($_POST["usr"]) && isset($_POST["pwd"])){
		
		$_POST["usr"] = strtolower($_POST["usr"]);
		
		$monfichier = fopen("files/login.json", "r");
		$line = fgets($monfichier);
		$array = json_decode($line,true);
		fclose($monfichier);
		
		if(isset($array[$_POST["usr"]]) && $array[$_POST["usr"]]==sha1("zztask".$_POST["pwd"]."bcrypt")){
		
			$file_online = "./files/who_is_online.json";
			$file = fopen($file_online, "r");
			$line = fgets($file);
			$arr = json_decode($line,true);
			fclose($file);
				
			if (isset($arr[$_POST["usr"]]) && $arr[$_POST["usr"]] > strtotime('now -15 seconds')){
		
				$error = 1;
				//header("Location: index.php?error='".$error."'");
				//exit();
				
			}
			else {
				
				$_SESSION["login"]=$_POST["usr"];
				setcookie('login',$_POST["usr"],time()+(3600*24*30));
				
				$monfichier = fopen("files/roles.json", "r");
				$line = fgets($monfichier);
				$array = json_decode($line,true);
				fclose($monfichier);
				
				$_SESSION["role"] = $array[$_POST["usr"]];
				
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

