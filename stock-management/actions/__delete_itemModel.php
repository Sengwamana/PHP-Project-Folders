<?php
require_once '../bootstrap.php';

/**
 * do not let anyone play with your URLs :>
 *
 */
LogInCheck();

if(isset($_GET['item_id'])){
    require_once '../db.php';
    $sql = "DELETE FROM `item` WHERE `item_id` = '".$_GET['item_id']."'";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = 'Item deleted successfully';
    }
    else
    {
        $_SESSION['error'] = 'Something went wrong in deleting member query';
    }
}
else{
    $_SESSION['error'] = 'Select member to delete first';
}

header('location: ../items.php');