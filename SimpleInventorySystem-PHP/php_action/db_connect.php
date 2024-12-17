<?php 	

$localhost = "localhost";
$username = "root";
$password = "12345";
$dbname = "sinventoryphp";
$store_url = "http://localhost/SimpleInventorySystem-PHP/";
// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>