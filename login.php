<?php
	if(isset($_POST["usr"]))
	{
		$monfichier = fopen("files/login.json", "r");
		$line = fgets($monfichier);
		$array = json_decode($line,true);
		fclose($monfichier);
		if(isset($array[$_POST["usr"]]))
		{
			if($array[$_POST["usr"]]==sha1($_POST["pwd"]))
			{ 
				echo "connecté"; 
			}
			else
			{
				echo "mauvais mot de passe"; 
				//header("Location: index.php");
				//exit();
			}
		}
		else
		{
			echo "mauvais login"; 
			//header("Location: index.php");
			//exit();
		}
		
	}
	else
	{
		header("Location: index.php");
		exit();
	}
?>

