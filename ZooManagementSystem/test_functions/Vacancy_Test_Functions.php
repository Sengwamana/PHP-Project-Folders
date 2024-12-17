<?php
class Vacancy_Test_Functions{
	
	function check_vacancy($array){
		$isInvalid=false;
		
		if($array['v_position']==""){
			$isInvalid=true;
        }
		if($array['v_description']==""){
			$isInvalid=true;
        }
		if($array['v_type']==""){
			$isInvalid=true;
        }
		if($array['v_start_date']==""){
			$isInvalid=true;
        }
		if($array['v_end_date']==""){
			$isInvalid=true;
        }
		if($array['v_start_date']>$array['v_end_date']){
			$isInvalid=true;
        }
        
		return $isInvalid;
	}
}
?>