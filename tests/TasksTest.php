<?php session_start();

require_once(__DIR__."/../src/taskmanager.php");

class TestTasks extends PHPUnit_Framework_TestCase{

	public function testAddTask(){

		
		$_SESSION["login"] = "test";

		createTask("Test","23-01-2016","This is a test");
		
		$monfichier = fopen(__DIR__."/../src/files/todo.json", "r");
		$line = fgets($monfichier);
		fclose($monfichier);
		$arr = json_decode($line,true);
		
		$this->assertArrayHasKey('Test', $arr[0]);
		unset($_SESSION["login"]);
		
	}

	public function testDeleteTask(){
		
		deleteTask('Test');
		
		$monfichier = fopen(__DIR__."/../src/files/todo.json", "r");
		$line = fgets($monfichier);
		fclose($monfichier);
		$arr = json_decode($line,true);
		
		$this->assertNotArrayHasKey('Test', $arr[0]);

	}
}

?>
