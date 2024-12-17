<?php
	
		require("db.php");
		
		@$id 			= $_POST['deduction_id'];
		@$healthinsurance 	= $_POST['healthinsurance'];
		@$garnishments 			= $_POST['garnishments'];
		@$others 			= $_POST['others'];
		@$fica 			= $_POST['fica'];
		@$loans 		= $_POST['loans'];


		$sql = mysqli_query("UPDATE deductions SET garnishments='$garnishments', others='$others', fica='$fica', loans='$loans', healthinsurance='$healthinsurance' WHERE deduction_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Deductions updated!');
		            window.location.href='home_deductions.php';
		        </script>
		    <?php 
		}
		else {
			echo "Something went wrong, Please try again!"; 
		}
 ?>