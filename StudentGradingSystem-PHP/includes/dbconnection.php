<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "12345";
$database = "resultgrading";

// Establish connection
$con = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Connection Failed: " . mysqli_connect_error();
    exit(); // Stop further execution if the connection fails
}

// Connection is successful
// Add your query and other operations here

?>
<!-- Log on to codeastro.com for more projects! -->
