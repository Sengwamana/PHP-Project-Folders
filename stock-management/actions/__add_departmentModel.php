<?php
require_once '../bootstrap.php';
LogInCheck();
//only POST request is accepted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //print_r($_POST);


    //trim values from POST
    $dept_name = trim($_POST['dept_name']);
    $dept_details = trim($_POST['dept_details']);
    $password = $_POST['pass'];
    $con_pass = $_POST['con_pass'];



    //if password matches
    if($password == $con_pass)
    {
        //connect to db
        require_once '../db.php';
        $sql = "INSERT INTO `department` (`dept_name`, `dept_details`, `password`, `added_at`) VALUES ('" . $dept_name . "',' " . $dept_details . "','" . $password . "', CURDATE())";
        // var_dump($sql);

        //perform query
        $query = $conn->query($sql);
        $conn->close();

        if ($query == true) {
            //var_dump($query);
            $_SESSION['success'] = 'department added successfully';
            header('location: ../departments.php');
        }
        else
         {
            $_SESSION['error'] = 'something went wrong';
            header('location: ../departments.php');
        }
    }
    else
    {
        $_SESSION['error'] = 'password did not matched !!!! try again ';
        header('location: ../departments.php');
    }
}
else {
    $_SESSION['error'] = 'Something went wrong while adding department';
    header('location: ../departments.php');
}





