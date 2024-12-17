<?php
	
		require("db.php");
		
		@$id 			= $_POST['ot_id'];
		@$overtime		= $_POST['rate'];


		$sql = mysqli_query($conn,"UPDATE overtime SET rate='$overtime' WHERE ot_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Overtime Rate has been updated!');
		            window.location.href='home_salary.php';
		        </script>
		    <?php 
		}
		else {
			echo "Something went wrong!"; 
		}
 ?>