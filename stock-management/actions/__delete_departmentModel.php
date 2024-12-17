<?php
require_once '../bootstrap.php';

/**
 * do not let anyone play with your URLs :>
 *
 */
LogInCheck();

if(isset($_GET['dept_id'])){
    require_once '../db.php';
    $sql = "DELETE FROM `department` WHERE `dept_id` = '".$_GET['dept_id']."'";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = 'department deleted successfully';
    }
    else
    {
        $_SESSION['error'] = 'Something went wrong ';
    }
}
else{
    $_SESSION['error'] = 'Select department to delete first';
}

header('location: ../departments.php');