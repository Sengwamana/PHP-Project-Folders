<?php
require_once '../bootstrap.php';
//only POST request is accepted
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //csrf protection 
    if(!(Token::verify($_POST['token'])))
    {
        $_SESSION['error'] = 'Session Has Expired!!!';
        header('location: ../index.php');
    }
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //var_dump($_POST);
    $_id = $_POST['id'];
    $_password = $_POST['password'];

    //connect db
    require_once '../db.php';
    $sql = "SELECT * FROM  `department` WHERE `dept_id`='" . $_id . "' AND `password`='" . $_password . "'";
    //$sql = "SELECT * FROM  `department` WHERE `dept_id`='" . $_id . "'";
    //print_r($sql);
    $result = $conn->query($sql);
     //print_r($result);

    //if result is true
    if($result == true)
    {
        if(!($result->num_rows == 1)) {
            $_SESSION['error'] = 'Wrong Credentials !!!';
            header('location: ../index.php');
        }
        else
        {
            /*if returns single row*/
            $row = $result->fetch_assoc();
            //var_dump($row);
            if($row['role'] == 1)
            {
                //set session
                $_SESSION['dept_name'] = 'ADMIN';
                $_SESSION['dept_id'] = $row['dept_id'];
                $_SESSION['role'] = 'admin';
                $_SESSION['success'] = 'welcome ' . $row['dept_name'] . ' to admin home page';


                //if role is admin redirect to admin home
                header('location: ../admin_home.php');
            }
            else
            {
                //set session
                $_SESSION['dept_name'] = $row['dept_name'];
                $_SESSION['dept_id'] = $row['dept_id'];
                $_SESSION['role'] = 'dept';
                $_SESSION['success'] = 'welcome ' . $row['dept_name'] . ' to depeartmental home page';


                //redirect to gen user home
                header('location: ../admin_home.php');
            }
        }
    }
    //close connection
    $conn->close();
}
else
{
    $_SESSION['error'] = 'Something went wrong';
    //echo '<script>alert("login failed try again");</script>';
    header('location: ../index.php');
}
