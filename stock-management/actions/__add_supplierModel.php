<?php
require_once '../bootstrap.php';
LogInCheck();
//only POST request is accepted
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //print_r($_POST);


    //trim the values
    $supplier_name = trim($_POST['supplier_name']);
    $supplier_details = trim($_POST['supplier_details']);

    //connect to db
    require_once '../db.php';
    $sql = "INSERT INTO `supplier` (`supplier_name`, `supplier_details`, `added_at`) VALUES ('" . $supplier_name . "',' " . $supplier_details . "', CURDATE())";
    $query = $conn->query($sql);
    //var_dump($query);
    //var_dump($sql);

    if($query == true)
    {
        $_SESSION['success'] = 'supplier added successfully';
        //redirect to item home
        header('location: ../suppliers.php');
    }
    else
    {
        $_SESSION['error'] = 'Something went wrong while adding supplier department';
        //redirect to item home
        header('location: ../suppliers.php');
    }

}
else
{
    $_SESSION['error'] = 'Something went wrong while adding supplier';
    header('location: ../suppliers.php');
}
