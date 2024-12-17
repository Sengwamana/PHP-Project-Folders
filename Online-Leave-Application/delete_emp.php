<?php
require_once("DBConnection.php");
session_start();
                                     
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $deleteQuery="DELETE FROM users WHERE id=$id"; 
    mysqli_query($conn, $deleteQuery);

    echo "<script>window.location = 'list_emp.php';</script>";
} else {
    echo "ERROR!";
}

?>