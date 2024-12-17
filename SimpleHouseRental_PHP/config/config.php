<?php
	session_start();

	// Define database
	define('dbhost', 'localhost');
	define('dbuser', 'root');
	define('dbpass', '12345');
	define('dbname', 'shouserental');

	// Connecting database
	try {
		$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}

?>
