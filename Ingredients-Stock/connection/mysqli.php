<?php
    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $dbname = "ingredientstock";
    $mysqli = new mysqli($servername,$username,$password,$dbname) or die($mysqli->error);
?>
