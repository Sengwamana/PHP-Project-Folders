<?php
  $conn = mysqli_connect('localhost','root','12345','onlineleavedb');
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
  }
?>