<?php
require 'test_functions/Animal_Test_Functions.php';
class Animal_Test extends \PHPUnit_Framework_TestCase{
		
	function testEmptyGivenName(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'',
			'an_species_name'=>'given',
			'an_dob'=>'given',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'given',
			'location_id'=>'given',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'given',
			'an_joindate'=>'given',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }

    function testEmptySpeciesName(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'',
			'an_dob'=>'given',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'given',
			'location_id'=>'given',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'given',
			'an_joindate'=>'given',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }

    function testEmptyDOB(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'given',
			'an_dob'=>'',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'given',
			'location_id'=>'given',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'given',
			'an_joindate'=>'given',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }

    function testEmptyGender(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'given',
			'an_dob'=>'given',
			'an_gender'=>'',
			'an_avg_lifespan'=>'given',
			'location_id'=>'given',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'given',
			'an_joindate'=>'given',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }
    
    function testEmptyLifespan(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'given',
			'an_dob'=>'given',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'',
			'location_id'=>'given',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'given',
			'an_joindate'=>'given',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }

    function testEmptyLocation(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'given',
			'an_dob'=>'given',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'given',
			'location_id'=>'',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'given',
			'an_joindate'=>'given',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }

    function testEmptyDiet(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'given',
			'an_dob'=>'given',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'given',
			'location_id'=>'given',
			'an_dietary_req'=>'',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'given',
			'an_joindate'=>'given',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }

    function testEmptyHabitat(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'given',
			'an_dob'=>'given',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'given',
			'location_id'=>'given',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'',
			'an_pop_dist'=>'given',
			'an_joindate'=>'given',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }

    function testEmptyPop(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'given',
			'an_dob'=>'given',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'given',
			'location_id'=>'given',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'',
			'an_joindate'=>'given',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }

    function testEmptyJoin(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'given',
			'an_dob'=>'given',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'given',
			'location_id'=>'given',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'given',
			'an_joindate'=>'',
			'class_id'=>'1'
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }

    function testEmptyClass(){
		$fun= new Animal_Test_Functions();
		$array=[
			'an_given_name'=>'given',
			'an_species_name'=>'given',
			'an_dob'=>'given',
			'an_gender'=>'given',
			'an_avg_lifespan'=>'given',
			'location_id'=>'given',
			'an_dietary_req'=>'given',
			'an_natural_habitat'=>'given',
			'an_pop_dist'=>'given',
			'an_joindate'=>'given',
			'class_id'=>''
		];
		$bool=$fun->check_animal($array);
		$this->assertTrue($bool);
    }
}
?>