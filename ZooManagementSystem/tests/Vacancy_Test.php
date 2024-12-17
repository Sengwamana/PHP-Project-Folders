<?php
require 'test_functions/Vacancy_Test_Functions.php';
class Vacancy_Test extends \PHPUnit_Framework_TestCase{
		
	function testEmptyPosition(){
		$vacancyFun= new Vacancy_Test_Functions();
		$array=[
			'v_position'=>'',
			'v_description'=>'Valid',
			'v_type'=>'permanent',
            'v_start_date'=>'2001-11-24',
            'v_end_date'=> '2001-12-20'
		];
		$bool=$vacancyFun->check_vacancy($array);
		$this->assertTrue($bool);
    }

    function testEmptyDescription(){
		$vacancyFun= new Vacancy_Test_Functions();
		$array=[
			'v_position'=>'valid',
			'v_description'=>'',
			'v_type'=>'permanent',
            'v_start_date'=>'2001-11-24',
            'v_end_date'=> '2001-12-20'
		];
		$bool=$vacancyFun->check_vacancy($array);
		$this->assertTrue($bool);
    }

    function testEmptyType(){
		$vacancyFun= new Vacancy_Test_Functions();
		$array=[
			'v_position'=>'valid',
			'v_description'=>'valid',
			'v_type'=>'',
            'v_start_date'=>'2001-11-24',
            'v_end_date'=> '2001-12-20'
		];
		$bool=$vacancyFun->check_vacancy($array);
		$this->assertTrue($bool);
    }

    function testEmptyStartDate(){
		$vacancyFun= new Vacancy_Test_Functions();
		$array=[
			'v_position'=>'valid',
			'v_description'=>'valid',
			'v_type'=>'valid',
            'v_start_date'=>'',
            'v_end_date'=> '2001-12-20'
		];
		$bool=$vacancyFun->check_vacancy($array);
		$this->assertTrue($bool);
    }

    function testEmptyEndDate(){
		$vacancyFun= new Vacancy_Test_Functions();
		$array=[
			'v_position'=>'valid',
			'v_description'=>'valid',
			'v_type'=>'valid',
            'v_start_date'=>'2001-11-24',
            'v_end_date'=> ''
		];
		$bool=$vacancyFun->check_vacancy($array);
		$this->assertTrue($bool);
    }

    function testInvalidDate(){
        $vacancyFun= new Vacancy_Test_Functions();
		$array=[
			'v_position'=>'valid',
			'v_description'=>'Valid',
			'v_type'=>'permanent',
            'v_start_date'=>'2001-11-24',
            'v_end_date'=> '2001-11-01'
		];
		$bool=$vacancyFun->check_vacancy($array);
		$this->assertTrue($bool);
    }

    function testValid(){
    	$vacancyFun= new Vacancy_Test_Functions();
		$array=[
			'v_position'=>'valid',
			'v_description'=>'Valid',
			'v_type'=>'permanent',
            'v_start_date'=>'2001-11-24',
            'v_end_date'=> '2001-12-01'
		];
		$bool=$vacancyFun->check_vacancy($array);
		$this->assertFalse($bool);
    }
}
?>