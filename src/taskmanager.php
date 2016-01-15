<?php session_start();



$error = "";
$done = "";

	if(isset($_POST['Create']))
	{
		create();
	}	
	else if(isset($_POST['Delete']))
	{
		delete();
	}
	
	function create()
	{
		$file = "taskmanager";
		include("./languages/manage_languages.php");
		include($lang_file);
		
		$name = $_POST['name'];
		$creator = $_SESSION['login'];
		$dateofcreation = date('d-m-Y');
		$deadline = $_POST['del'];
		$description = $_POST['des'];
		$array = array(array( "name" =>$name,"creator"  =>$creator,"datecreation"  => $dateofcreation,"deadline" =>$deadline,"descrip" =>$description));
		$monfichier = fopen("files/projects_file/".$name.".json", "w");
		chmod("files/projects_file/".$name.".json", 0755);
		fputs($monfichier, json_encode($array));
		fclose($monfichier);
		$monfichier = fopen("files/todo.json", "r");
		$line = fgets($monfichier);
		fclose($monfichier);
		$arr = json_decode($line,true);
		$array = array( 0 => array("name" => $name) );
		$todo = array_merge($arr,$array);
		$monfichier = fopen("files/todo.json", "w");
		fputs($monfichier, json_encode($todo));
		fclose($monfichier);
		$done = $TXT_CREATED;
		header("Location: createtask.php?done=".$done);
		exit();		
	}
	function delete()
	{
		$file = "taskmanager";
		include("./languages/manage_languages.php");
		include($lang_file);
		
		$name = $_POST['name'];
		if(!file_exists('files/projects_file/'.$name.'.json'))
		{
			$error = $TXT_DONT_EXIST;
			header("Location: deletetask.php?error=".$error);
			exit();
		}
		else
		{
			unlink('files/projects_file/'.$name.'.json');
			$monfichier = fopen("files/todo.json", "r");
			$line = fgets($monfichier);
			fclose($monfichier);
			$arr = json_decode($line,true);
			print_r($arr);
			for($i = 0;$i<count($arr) ;$i++)
			{
				if($arr[$i]['name'] == $name)
				{
					unset($arr[$i]);
					$arr = array_values($arr);
					var_dump($arr);

				}
			}
			print_r($arr);
			$monfichier = fopen("files/todo.json", "w");
			fputs($monfichier, json_encode($arr));
			fclose($monfichier);

			$monfichier = fopen("files/inprog.json", "r");
			$line = fgets($monfichier);
			fclose($monfichier);
			$arr = json_decode($line,true);
			print_r($arr);
			for($i = 0;$i<count($arr) ;$i++)
			{
				if($arr[$i]['name'] == $name)
				{
					unset($arr[$i]);
					$arr = array_values($arr);
					var_dump($arr);
				}
			}	
			print_r($arr);
			$monfichier = fopen("files/inprog.json", "w");
			fputs($monfichier, json_encode($arr));
			fclose($monfichier);
			
			$monfichier = fopen("files/done.json", "r");
			$line = fgets($monfichier);
			fclose($monfichier);
			$arr = json_decode($line,true);
			print_r($arr);
			for($i = 0;$i<count($arr) ;$i++)
			{
				if($arr[$i]['name'] == $name)
				{
					unset($arr[$i]);
					$arr = array_values($arr);
					var_dump($arr);
				}
			}		
			print_r($arr);
			$monfichier = fopen("files/done.json", "w");
			fputs($monfichier, json_encode($arr));
			fclose($monfichier);
			$done = $TXT_DELETED;
			header("Location: deletetask.php?done=".$done);
			exit();
		}
	}
?>
