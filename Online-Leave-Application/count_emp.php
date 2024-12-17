<?php

require_once("DBConnection.php");

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM users WHERE type='Employee'";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>