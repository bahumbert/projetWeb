<?php session_start();

$file = "login";
include("./languages/manage_languages.php");
include($lang_file);

$error = "";

	if(isset($_POST["usr"]) && isset($_POST["pwd"])){
		
		$monfichier = fopen("files/login.json", "r");
		$line = fgets($monfichier);
		$array = json_decode($line,true);
		fclose($monfichier);
		
		if(isset($array[$_POST["usr"]]) && $array[$_POST["usr"]]==sha1("zztask".$_POST["pwd"]."bcrypt")){
		
			$file_online = "./files/who_is_online.json";
			$file = fopen($file_online, "r");
			$line = fgets($file);
			$arr = json_decode($line,true);
			fclose(file);
				
			if (isset($arr[$_POST["usr"]]) && $arr[$_POST["usr"]] > date('Y/m/j H:i:s',strtotime('now -15 seconds'))){
		
				$error = $TXT_ALREADY_CONNECTED;
				//header("Location: index.php?error='".$error."'");
				//exit();
				
			}
			else {
				
				$_SESSION["login"]=$_POST["usr"];
				setcookie('login',$_POST["usr"],time()+(3600*24*30));
				//echo "Connecté"; 
				header("Location: task.php");
				exit();
				
			}
		}
		else {
			
			$error = $TXT_DOESNT_EXIST;
			//header("Location: index.php?error='".$error."'");
			//exit();
			
		}
	}
	else {
		$error = $TXT_NO_INPUT;
	}
	
	header("Location: index.php?error=".$error);
	exit();
?>

