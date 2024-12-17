<?php

$con = mysqli_connect("localhost","root","12345","realestatephp");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>