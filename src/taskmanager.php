<?php if(!isset($_SESSION)){
    session_start();
}

$error = "";															// Creates and deletes Tasks
$done = "";
$file = "taskmanager";
include(__DIR__."/languages/manage_languages.php");
include(__DIR__."/".$lang_file);
echo __DIR__."/".$lang_file;

	if(isset($_POST['Create']))
	{
		createTask($_POST['name'], $_POST['del'], $_POST['des']);
	}	
	else if(isset($_POST['Delete']))
	{
		deleteTask($_POST['name']);
	}
	
	function createTask($name,$deadline,$description)					// Creation
	{
		global $TXT_CREATED;
				
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
		/*header("Location: createtask.php?done=".$done);
		exit();	*/	
	}
	
	
	function deleteTask($name)											// Deletion
	{		
		
		global $TXT_DELETED;
		
		$name = htmlentities($name);
		if(!file_exists('files/projects_file/'.$name.'.json'))			// If theres no file named after the task, then it doesnt exist
		{
			$error = $TXT_DONT_EXIST;
			header("Location: deletetask.php?error=".$error);
			exit();
		}
		else
		{
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
			$done = $TXT_DELETED;
			/*header("Location: deletetask.php?done=".$done);
			exit();*/
		}
	}
?>
