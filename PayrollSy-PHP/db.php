]<?php
$connection = mysqli_connect('localhost', 'root', '12345', 'payroll_s');

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
