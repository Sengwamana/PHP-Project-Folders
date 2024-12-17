<?php
	
		require("db.php");
		
		@$id 			= $_POST['salary_id'];
		@$salary		= $_POST['salary_rate'];


		$sql = mysql_query($conn,"UPDATE salary SET salary_rate='$salary' WHERE salary_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Salary rate has been updated!');
		            window.location.href='home_salary.php';
		        </script>
		    <?php 
		}
		else {
			echo "Something went wrong, Please try again!"; 
		}
 ?>