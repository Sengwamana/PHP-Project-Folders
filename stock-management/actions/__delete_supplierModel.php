<?php
require_once '../bootstrap.php';

/**
 * do not let anyone play with your URLs :>
 *
 */
LogInCheck();

if(isset($_GET['supplier_id'])){
    require_once '../db.php';
    $sql = "DELETE FROM `supplier` WHERE `supplier_id` = '".$_GET['supplier_id']."'";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = 'supplier deleted successfully';
    }
    else
    {
        $_SESSION['error'] = 'Something went wrong ';
    }
}
else{
    $_SESSION['error'] = 'Select supplier to delete first';
}

header('location: ../suppliers.php');