<?php
include 'db.php';

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Execute the query
$result = mysqli_query($connection, "SELECT * FROM employee");

// Use mysqli_num_rows() instead of mysql_num_rows()
if ($result) {
    $rows = mysqli_num_rows($result);
    echo $rows;
} else {
    echo "Error executing query: " . mysqli_error($connection);
}
?>
