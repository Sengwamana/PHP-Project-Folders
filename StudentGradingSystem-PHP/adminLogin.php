<?php
session_start();
error_reporting(E_ALL); // Turn on error reporting temporarily for debugging

include('includes/dbconnection.php');

// Initialize error message
$errorMsg = '';

if (isset($_POST['login'])) {
    // Sanitize input
    $staffId = mysqli_real_escape_string($con, $_POST['staffId']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Secure password verification using password_hash and password_verify
    $query = mysqli_query($con, "SELECT * FROM tbladmin WHERE staffId='$staffId'");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($query);

        // Verify password
        if (password_verify($password, $row['password'])) {
            // Set session variables on successful login
            $_SESSION['staffId'] = $row['staffId'];
            $_SESSION['emailAddress'] = $row['emailAddress'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['adminTypeId'] = $row['adminTypeId'];

            // Redirect based on admin type
            if ($_SESSION['adminTypeId'] == 1) { // SuperAdministrator
                header("Location: superAdmin/index.php");
                exit;
            } elseif ($_SESSION['adminTypeId'] == 2) { // Administrator
                header("Location: admin/index.php");
                exit;
            }
        } else {
            // Incorrect password
            $errorMsg = "<div class='alert alert-danger' role='alert'>Invalid Username/Password!</div>";
        }
    } else {
        // Username not found
        $errorMsg = "<div class='alert alert-danger' role='alert'>Invalid Username/Password!</div>";
    }
}
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Grading PHP</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style2.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-light">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <form method="post" action="">
                        <?php echo $errorMsg; ?>
                        <strong><h2 align="center">Administrator Login</h2></strong><hr>
                        <div class="form-group">
                            <label>Staff ID</label>
                            <input type="text" name="staffId" required class="form-control" placeholder="Staff ID">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label class="pull-left">
                                <a href="index.php">Go Back</a>
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgot Password?</a>
                            </label>
                        </div>
                        <br>
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
