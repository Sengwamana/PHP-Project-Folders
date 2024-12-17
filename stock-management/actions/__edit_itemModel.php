<?php

    require_once '../bootstrap.php';
    //only POST request is accepted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Sanitize POST array
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //print_r($_POST);

        //trim the values
        $item_id = $_POST['item_id'];
        $item_name = trim($_POST['item_name']);
        $item_cat = trim($_POST['item_cat']);
        $item_detail = trim($_POST['item_detail']);
        $supplied_at = $_POST['supplied_at'];
        //connect to db
        require_once '../db.php';
        $sql = " UPDATE `item` SET `item_name` = '" .$item_name. "',`item_cat` = '" .$item_cat."', `item_detail` = '" .$item_detail. "' WHERE `item`.`item_id` = '" .$item_id. "'";
        $query = $conn->query($sql);
        //var_dump($query);
        //var_dump($sql);

        if($query == true)
        {
            $_SESSION['success'] = 'item updated successfully';

        }

        else
        {
            $_SESSION['error'] = 'Something went wrong while updating item';
        }

        //redirect to item home
        header('location: ../items.php');




   }
   else
   {
       //$_SESSION['error'] = 'Something went wrong while updating item';
       //header('location: ../items.php');
   }





