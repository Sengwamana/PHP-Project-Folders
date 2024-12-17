<?php
require_once '../bootstrap.php';

//only POST request is accepted
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //print_r($_POST);
    $dept_id = $_POST['dept_id'];
    $email = $_POST['email'];
    //connect to db

    require_once '../db.php';
    $sql = "SELECT * FROM `department` WHERE `dept_id` = '" . $dept_id ."'";
    $query = $conn->query($sql);
    //var_dump($query);
    //var_dump($sql);

    if($query == true)
    {
        if($query->num_rows)
        {
            $row = $query->fetch_assoc();
            //reset the password for the department
            $otp = OTP::generate();
            $sql = " UPDATE `department` SET `password`='". $otp ."' WHERE `dept_id` = '" .$dept_id. "'";
            $query = $conn->query($sql);
            if($sql == true){
                $_SESSION['success'] = 'password updated <br> please note down the password : <span class=""><strong>'. $otp .'</strong><span>';
                //send password
                //begin mail
                header('location: ../forgot_pass.php');
            }

        }
        else
        {
            $_SESSION['error'] = ' Department Does not Exists!!';
            header('location: ../forgot_pass.php');
        }
    }
    else
    {
        $_SESSION['error'] = 'Something Went Wrong!!';
        header('location: ../forgot_pass.php');
    }

}
else
{
    $_SESSION['error'] = 'Something went wrong !!! try again later';
    header('location: ../forgot_pass.php');
}