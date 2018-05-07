<?php
/**
 * Test
 */
 class Test //objek
 {
 	public $test = 'test'; //property
 	function __construct()
 	{
 		// echo 'test';
 	}

 	function test1() //method
 	{
 		echo "test1";
 	}

 	function test2()
 	{
 		echo "test2";
 	}
 }
 $temp = new Test();//deklarasi objek
 $temp->test1();
 ?>