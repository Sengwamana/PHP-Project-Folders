<?php
class Application_Test_Functions{
	
	function check_application($array){
		$isInvalid=false;
		
		if($array['a_fullname']==""){
			$isInvalid=true;
        }
		if($array['a_email']==""){
			$isInvalid=true;
        }
		if($array['a_phone']==""){
			$isInvalid=true;
        }
		if($array['a_cv']==""){
			$isInvalid=true;
        }
		if($array['vacancy_id']==""){
			$isInvalid=true;
        }
		return $isInvalid;
	}
}
