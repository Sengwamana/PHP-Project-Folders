<?php

/**
 * this is used to create 
 * back up of the system
 */

require_once 'bootstrap.php';
LogInCheck();

//if not admin redirect to home page
if($_SESSION['role'] != 'admin')
{
    header('location: admin_home.php');
}
//take backup
$result = backDb('localhost','root','','stock');
if( $result == 1)
{
    // $_SESSION['success'] = 'back up taken successfully';
    echo '<script>location.href = "admin_home.php";</script>';

}
else{
    $_SESSION['error'] = 'something went wrong ';
    header('location: admin_home.php');
}

