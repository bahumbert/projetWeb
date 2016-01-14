<?php

require_once(__DIR__."/../src/createuser.php");
require_once(__DIR__."/../src/deleteuser.php");
require_once(__DIR__."/../src/login.php");
require_once(__DIR__."/../src/includes/list_all_user.php"); 

class Tests extends PHPUnit_Framework_TestCase{

	public function testAddUser(){

		createuser("KOUKOU","KIKOU","2");
		$array = list_all_user("./files/roles.json");
		$this->assertArrayHasKey('KOUKOU', $array);
		
		
	}

	public function testDeleteUser(){
		
		deleteuser('KOUKOU');
		$array = list_all_user("./files/roles.json");
		$this->assertNotArrayHasKey('KOUKOU', $array);

	}
}
