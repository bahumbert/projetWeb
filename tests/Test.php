<?php

require_once("../src/createuser.php");
require_once("../src/login.php");

class Tests extends PHPUnit_Framework_TestCase{

	public function testAddUser(){

		createuser("KOUKOU","KIKOU","2");
		
		include("./includes/list_all_user.php"); 
		
		$array = list_all_user("./files/roles.json");
		$this->assertArrayHasKey('KOUKOU', $array);
		
		//$this->assertEquals(1,1);
		
	}
}
