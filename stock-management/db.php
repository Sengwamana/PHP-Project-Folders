<?php

error_reporting(0);
require_once 'bootstrap.php';
//connection string
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);


//check
if($conn->connect_error)
{
    //if connection error occurs show the error and error code and die
    die('Connection ERROR [' . $conn->connect_errno . ']:' . $conn->connect_error );
}

/**
  *else{
  *echo 'connection established';
  *}
  **/