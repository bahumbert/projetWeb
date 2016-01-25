<?php

require_once(__DIR__."/../src/createuser.php");
require_once(__DIR__."/../src/deleteuser.php");
require_once(__DIR__."/../src/includes/list_all_user.php"); 

class TestAccount extends PHPUnit_Framework_TestCase{

	public function testAddUser(){

		createuser("KOUKOU","KIKOU","2");
		$array = list_all_user(__DIR__."/../src/files/roles.json");
		$this->assertArrayHasKey('KOUKOU', $array);
		
		
	}

	public function testDeleteUser(){
		
		deleteuser('KOUKOU');
		$array = list_all_user(__DIR__."/../src/files/roles.json");
		$this->assertNotArrayHasKey('KOUKOU', $array);

	}
}

?>
