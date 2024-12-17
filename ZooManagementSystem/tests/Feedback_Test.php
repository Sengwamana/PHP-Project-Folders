<?php
require 'test_functions/Feedback_Test_Functions.php';
class Feedback_Test extends \PHPUnit_Framework_TestCase{
		
	function testEmptyFirstName(){
		$fun= new Feedback_Test_Functions();
		$array=[
			'f_firstname'=>'',
			'f_lastname'=>'Valid',
			'f_email'=>'email@email.com',
            'f_subject'=>'valid',
            'f_message'=> 'valid',
            'visitor_id'=>'1'
		];
		$bool=$fun->check_feedback($array);
		$this->assertTrue($bool);
    }

    function testEmptyLastName(){
		$fun= new Feedback_Test_Functions();
		$array=[
			'f_firstname'=>'valid',
			'f_lastname'=>'',
			'f_email'=>'email@email.com',
            'f_subject'=>'valid',
            'f_message'=> 'valid',
            'visitor_id'=>'1'
		];
		$bool=$fun->check_feedback($array);
		$this->assertTrue($bool);
    }
    
    function testEmptyEmail(){
		$fun= new Feedback_Test_Functions();
		$array=[
			'f_firstname'=>'valid',
			'f_lastname'=>'Valid',
			'f_email'=>'',
            'f_subject'=>'valid',
            'f_message'=> 'valid',
            'visitor_id'=>'1'
		];
		$bool=$fun->check_feedback($array);
		$this->assertTrue($bool);
    }

    function testEmptySubject(){
		$fun= new Feedback_Test_Functions();
		$array=[
			'f_firstname'=>'valid',
			'f_lastname'=>'Valid',
			'f_email'=>'valid',
            'f_subject'=>'',
            'f_message'=> 'valid',
            'visitor_id'=>'1'
		];
		$bool=$fun->check_feedback($array);
		$this->assertTrue($bool);
    }

    function testEmptyMessage(){
		$fun= new Feedback_Test_Functions();
		$array=[
			'f_firstname'=>'valid',
			'f_lastname'=>'Valid',
			'f_email'=>'valid',
            'f_subject'=>'valid',
            'f_message'=> '',
            'visitor_id'=>'1'
		];
		$bool=$fun->check_feedback($array);
		$this->assertTrue($bool);
    }

    function testEmptyVisitor(){
		$fun= new Feedback_Test_Functions();
		$array=[
			'f_firstname'=>'valid',
			'f_lastname'=>'Valid',
			'f_email'=>'valid',
            'f_subject'=>'valid',
            'f_message'=> 'valid',
            'visitor_id'=>''
		];
		$bool=$fun->check_feedback($array);
		$this->assertTrue($bool);
    }

}
?>