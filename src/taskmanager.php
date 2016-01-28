<?php ob_start();
if(!isset($_SESSION)){
    session_start();
}

$error = "";															// Creates and deletes Tasks
$done = "";
$file = "taskmanager";
include(__DIR__."/languages/manage_languages.php");
include(__DIR__."/".$lang_file);

	if(isset($_POST['Create']))
	{
		$file1 = "createtask";
		createTask($_POST['name'], $_POST['del'], $_POST['des']);
		$done = $TXT_CREATED;
		header("Location: ".$file1.".php?done=".$done);
		exit();	
	}	
	else if(isset($_POST['Delete']))
	{
		$file1 = "deletetask";
		deleteTask($_POST['name']);
		$done = $TXT_DELETED;
		header("Location: ".$file1.".php?done=".$done);
		exit();
	}
	else if(isset($_POST['Update']))
	{
		$file1 = "updatetask";
		deleteTask($_POST['oldname']);
		createTask($_POST['newname'], $_POST['del'], $_POST['des']);
		$done = $TXT_UPDATED;
		header("Location: ".$file1.".php?done=".$done);
		exit();
	}
	
	function createTask($name,$deadline,$description)					// Creation
	{
		global $TXT_ERROR, $file1;
		
		$dir = opendir(__DIR__."/files/projects_file/");
		 while (($file = readdir($dir)) !== false && $file != $name.".json") {
        }
		closedir($dir);
		
		if ($file == $name.".json"){
			$error =  $TXT_ERROR;
			header("Location: ".$file1.".php?error=".$error);
			exit();
		}
		else {
		
			$creator = $_SESSION['login'];
			$dateofcreation = date('d-m-Y');								// Prepare vars
			$description = htmlentities($description);
			$array = array(array( "name" =>$name,"creator"  =>$creator,"datecreation"  => $dateofcreation,"deadline" =>$deadline,"descrip" =>$description));
			
			$monfichier = fopen(__DIR__."/files/projects_file/".$name.".json", "w");
			chmod(__DIR__."/files/projects_file/".$name.".json", 0755);				// Creates a file named after the task containing all its infos
			fputs($monfichier, json_encode($array));
			fclose($monfichier);
			
			$monfichier = fopen(__DIR__."/files/todo.json", "r");
			$line = fgets($monfichier);
			fclose($monfichier);
			
			$arr = json_decode($line,true);
			$array = array( 0 => array("name" => $name) );					// Adds the task in the todo file 
			$todo = array_merge($arr,$array);
			$monfichier = fopen(__DIR__."/files/todo.json", "w");
			fputs($monfichier, json_encode($todo));
			fclose($monfichier);
			
			$done = $TXT_CREATED;
		}
	}
	
	
	function deleteTask($name)											// Deletion
	{		
		
		global $TXT_DONT_EXIST, $TXT_NO_RIGHTS, $file1;
		
		$name = htmlentities($name);
		if(!file_exists('files/projects_file/'.$name.'.json'))			// If theres no file named after the task, then it doesnt exist
		{
			$error = $TXT_DONT_EXIST;
			header("Location: ".$file1.".php?error=".$error);
			exit();
		}
		else
		{
			
			$myfile = fopen('files/projects_file/'.$name.'.json','r');
			$line = fgets($myfile);
			$arr = json_decode($line,true);
			fclose($myfile);
			
			if ($_SESSION["role"] == 0 && ( $arr[0]["creator"] != $_SESSION["login"])){
				$error = $TXT_NO_RIGHTS;
				header("Location: ".$file1.".php?error=".$error);
				exit();
			}
			else {
				unlink('files/projects_file/'.$name.'.json');				// Otherwise we can delete it
				$monfichier = fopen(__DIR__."/files/todo.json", "r");
				$line = fgets($monfichier);
				fclose($monfichier);
				$arr = json_decode($line,true);
				//print_r($arr);
				
				for($i = 0;$i<count($arr) ;$i++)
				{
					if($arr[$i]['name'] == $name)
					{
						unset($arr[$i]);
						$arr = array_values($arr);
						var_dump($arr);

					}
				}
				//print_r($arr);
				
				$monfichier = fopen(__DIR__."/files/todo.json", "w");
				fputs($monfichier, json_encode($arr));
				fclose($monfichier);

				$monfichier = fopen(__DIR__."/files/inprog.json", "r");
				$line = fgets($monfichier);
				fclose($monfichier);
				$arr = json_decode($line,true);
				//print_r($arr);
				
				for($i = 0;$i<count($arr) ;$i++)
				{
					if($arr[$i]['name'] == $name)
					{
						unset($arr[$i]);
						$arr = array_values($arr);
						var_dump($arr);
					}
				}	
				//print_r($arr);
				
				$monfichier = fopen(__DIR__."/files/inprog.json", "w");
				fputs($monfichier, json_encode($arr));
				fclose($monfichier);
				
				$monfichier = fopen(__DIR__."/files/done.json", "r");
				$line = fgets($monfichier);
				fclose($monfichier);
				$arr = json_decode($line,true);
				//print_r($arr);
				
				for($i = 0;$i<count($arr) ;$i++)
				{
					if($arr[$i]['name'] == $name)
					{
						unset($arr[$i]);
						$arr = array_values($arr);
						var_dump($arr);
					}
				}		
				//print_r($arr);
				
				$monfichier = fopen(__DIR__."/files/done.json", "w");
				fputs($monfichier, json_encode($arr));
				fclose($monfichier);
			}
		}
	}
?>
