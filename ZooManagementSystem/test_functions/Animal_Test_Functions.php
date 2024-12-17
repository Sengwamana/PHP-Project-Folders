<?php
class Animal_Test_Functions{
	
	function check_animal($array){
		$isInvalid=false;
		
		if($array['an_given_name']==""){
			$isInvalid=true;
        }
		if($array['an_species_name']==""){
			$isInvalid=true;
        }
		if($array['an_dob']==""){
			$isInvalid=true;
        }
		if($array['an_gender']==""){
			$isInvalid=true;
        }
		if($array['an_avg_lifespan']==""){
			$isInvalid=true;
        }
        if($array['location_id']==""){
			$isInvalid=true;
        }
        if($array['an_dietary_req']==""){
			$isInvalid=true;
        }
        if($array['an_natural_habitat']==""){
			$isInvalid=true;
        }
        if($array['an_pop_dist']==""){
			$isInvalid=true;
        }
        if($array['an_joindate']==""){
			$isInvalid=true;
        }
        if($array['class_id']==""){
			$isInvalid=true;
        }
        
		return $isInvalid;
	}
}
