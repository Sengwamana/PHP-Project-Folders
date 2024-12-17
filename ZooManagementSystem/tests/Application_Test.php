<?php
require 'test_functions/Application_Test_Functions.php';
class Application_Test extends \PHPUnit_Framework_TestCase{
		
	function testEmptyFullName(){
		$fun= new Application_Test_Functions();
		$array=[
			'a_fullname'=>'',
			'a_email'=>'email@email.com',
			'a_phone'=>'1234567890',
            'a_cv'=>'valid',
            'vacancy_id'=> '1'
		];
		$bool=$fun->check_application($array);
		$this->assertTrue($bool);
    }

    function testEmptyEmail(){
		$fun= new Application_Test_Functions();
		$array=[
			'a_fullname'=>'valid',
			'a_email'=>'',
			'a_phone'=>'1234567890',
            'a_cv'=>'valid',
            'vacancy_id'=> '1'
		];
		$bool=$fun->check_application($array);
		$this->assertTrue($bool);
    }

    function testEmptyPhone(){
		$fun= new Application_Test_Functions();
		$array=[
			'a_fullname'=>'valid',
			'a_email'=>'email@email.com',
			'a_phone'=>'',
            'a_cv'=>'valid',
            'vacancy_id'=> '1'
		];
		$bool=$fun->check_application($array);
		$this->assertTrue($bool);
    }

    function testEmptyCV(){
		$fun= new Application_Test_Functions();
		$array=[
			'a_fullname'=>'valid',
			'a_email'=>'email@email.com',
			'a_phone'=>'1234567890',
            'a_cv'=>'',
            'vacancy_id'=> '1'
		];
		$bool=$fun->check_application($array);
		$this->assertTrue($bool);
    }

    function testEmptyVacancy(){
		$fun= new Application_Test_Functions();
		$array=[
			'a_fullname'=>'valid',
			'a_email'=>'email@email.com',
			'a_phone'=>'1234567890',
            'a_cv'=>'valid',
            'vacancy_id'=> ''
		];
		$bool=$fun->check_application($array);
		$this->assertTrue($bool);
    }
}
?>