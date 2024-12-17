<?php
require_once '../bootstrap.php';
LogInCheck();
//only POST request is accepted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //print_r($_POST);
    //trim values from POST
    $item_name = trim($_POST['item']);
    $item_cat = trim($_POST['category']);
    $item_detail = trim($_POST['details']);
    $bill_no = trim($_POST['bill_no']);
    $supplier_id = $_POST['supplierName'];

    //connect to db
    require_once '../db.php';
    $sql = "INSERT INTO `item` (`item_name`, `item_cat`, `item_detail`, `bill_no`, `supplier_id`, `supplied_at`) VALUES ('" . $item_name . "',' " . $item_cat . "','" . $item_detail . "','" . $bill_no . "','" . $supplier_id . "' , CURDATE())";
     //var_dump($sql);

    //perform query
    $query = $conn->query($sql);
    //$conn->close();
    if($query == true){
        var_dump($query);
        $_SESSION['success'] = 'item added successfully';
        //header('location: ../items.php');
    }
    else
    {
        $_SESSION['error'] = 'something went wrong';
        //header('location: ../items.php');
    }

}
else {
    $_SESSION['error'] = 'Something went wrong while adding items';
    //header('location: ../items.php');
    }

header('location: ../items.php');



