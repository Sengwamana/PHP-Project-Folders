<?php
    require_once '../bootstrap.php';
    //only POST request is accepted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //print_r($_POST);

        //trim the values
        $dept_id = $_POST['dept_id'];
        $dept_name = trim($_POST['dept_name']);
        $dept_details = trim($_POST['dept_details']);

        //connect to db
        require_once '../db.php';
        $sql = " UPDATE `department` SET `dept_name` = '" .$dept_name. "', `dept_details` = '" .$dept_details. "' WHERE `department`.`dept_id` = '" .$dept_id. "'";
        $query = $conn->query($sql);
        //var_dump($query);
        //var_dump($sql);

        if($query == true)
        {
            $_SESSION['success'] = 'department updated successfully';
            //redirect to item home
            header('location: ../departments.php');
        }
        else
        {
            $_SESSION['error'] = 'Something went wrong while updating department';
            //redirect to item home
            header('location: ../departments.php');
        }

    }
    else
    {
        $_SESSION['error'] = 'Something went wrong while updating item';
        header('location: ../departments.php');
    }
