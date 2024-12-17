<?php
class Feedback_Test_Functions{
	
	function check_feedback($array){
		$isInvalid=false;
		
		if($array['f_firstname']==""){
			$isInvalid=true;
        }
		if($array['f_lastname']==""){
			$isInvalid=true;
        }
		if($array['f_email']==""){
			$isInvalid=true;
        }
		if($array['f_subject']==""){
			$isInvalid=true;
        }
		if($array['f_message']==""){
			$isInvalid=true;
        }
		if($array['visitor_id']==""){
			$isInvalid=true;
        }
		return $isInvalid;
	}
}

