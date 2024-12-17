<?php
require_once '../bootstrap.php';
LogInCheck();
//only POST request is accepted
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //print_r($_POST);
    $dept_id = $_SESSION['dept_id'];
    //connect to db
    require_once '../db.php';
    $sql = "SELECT * FROM `department` WHERE `dept_id` = '" . $dept_id ."'";
    $query = $conn->query($sql);
    //var_dump($query);
    //var_dump($sql);
    if($query == true) {
        $row = $query->fetch_assoc();
        //close first conn
        //$conn->close();

        if($_POST['pass'] == $row['password'])
        {
            //check for confirm pass and new pass
            if($_POST['new_pass'] == $_POST['con_pass'])
            {
                //set new password
                $new_pass = $_POST['new_pass'];
                //now change password
                $sql = " UPDATE `department` SET `password` = '" . $new_pass . "' WHERE `department`.`dept_id` = '" . $_SESSION['dept_id'] . "'";
                $query = $conn->query($sql);
                //var_dump($query);
                //var_dump($sql);

                if ($query == true) {
                    $_SESSION['success'] = 'password changed successfully';
                    //redirect to item home
                    header('location: ../admin_home.php');
                }
                else
                {
                    $_SESSION['error'] = 'Something went wrong while changing password';
                    header('location: ../change_pass.php');
                }
            }
            else
            {
                $_SESSION['error'] = 'password didnot matched !!!';
                header('location: ../change_pass.php');

            }

        }

        else
        {
            $_SESSION['error'] = 'provide correct password';
            header('location: ../change_pass.php');
        }


    }
}
else
{
    $_SESSION['error'] = 'Something went wrong while changing password !!! try again later';
    header('location: ../change_pass.php');
}