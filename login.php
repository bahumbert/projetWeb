<?php
	if(isset($_POST["usr"]))
	{
		$monfichier = fopen("files/login.json", "r");
		$line = fgets($monfichier);
		$array = json_decode($line,true);
		fclose($monfichier);
		if(isset($array[$_POST["usr"]]))
		{
			if($array[$_POST["usr"]]==sha1("zztask".$_POST["pwd"]."bcrypt"))
			{ 
				$_SESSION["login"]=$_POST["usr"];
				setcookie('login',$_POST["usr"],time()+(3600*24*30));
				echo "connecté"; 
				header("Location: task.php");
				exit();
			}
			else
			{
				echo "mauvais mot de passe"; 
				header("Location: index.php");
				exit();
			}
		}
		else
		{
			echo "mauvais login"; 
			header("Location: index.php");
			exit();
		}
		
	}
	else
	{
		header("Location: index.php");
		exit();
	}
?>

