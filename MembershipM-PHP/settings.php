<?php
include('includes/config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateSettings'])) {
    $systemName = $_POST['systemName'];
    $currency = $_POST['currency'];

    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logoName = $_FILES['logo']['name'];
        $logoTmpName = $_FILES['logo']['tmp_name'];
        $logoType = $_FILES['logo']['type'];
        $uploadPath = 'uploads/'; 

        $targetPath = $uploadPath . $logoName;
        if (move_uploaded_file($logoTmpName, $targetPath)) {
            $updateSettingsQuery = "UPDATE settings SET system_name = '$systemName', logo = '$targetPath', currency = '$currency' WHERE id = 1";
            $updateSettingsResult = $conn->query($updateSettingsQuery);

            if ($updateSettingsResult) {
                $successMessage = 'System settings updated successfully.';
            } else {
                $errorMessage = 'Error updating system settings: ' . $conn->error;
            }
        } else {
            $errorMessage = 'Error moving uploaded file.';
        }
    } else {
        $updateSettingsQuery = "UPDATE settings SET system_name = '$systemName', currency = '$currency' WHERE id = 1";
        $updateSettingsResult = $conn->query($updateSettingsQuery);
        // Visit codeastro.com for more projects
        if ($updateSettingsResult) {
            $successMessage = 'System settings updated successfully.';
        } else {
            $errorMessage = 'Error updating system settings: ' . $conn->error;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changePassword'])) {
    // Get form data
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $userId = $_SESSION['user_id'];
    $validatePasswordQuery = "SELECT password FROM users WHERE id = $userId";
    $validatePasswordResult = $conn->query($validatePasswordQuery);

    if ($validatePasswordResult->num_rows > 0) {
        $row = $validatePasswordResult->fetch_assoc();
        $hashedPassword = $row['password'];

        if (md5($currentPassword) === $hashedPassword) {
            $hashedNewPassword = md5($newPassword);
            $updatePasswordQuery = "UPDATE users SET password = '$hashedNewPassword' WHERE id = $userId";
            $updatePasswordResult = $conn->query($updatePasswordQuery);

            if ($updatePasswordResult) {
                $successMessagePassword = 'Password updated successfully.';
            } else {
                $errorMessagePassword = 'Error updating password: ' . $conn->error;
            }
        } else {
            $errorMessagePassword = 'Current password is incorrect.';
        }
    }
}

$fetchSettingsQuery = "SELECT * FROM settings WHERE id = 1";
$fetchSettingsResult = $conn->query($fetchSettingsQuery);

if ($fetchSettingsResult->num_rows > 0) {
    $settings = $fetchSettingsResult->fetch_assoc();
}

?>

<?php include('includes/header.php');?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <?php include('includes/nav.php');?>
    <?php include('includes/sidebar.php');?>

    <div class="content-wrapper">
        <?php include('includes/pagetitle.php');?>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-cogs"></i> System Settings</h3>
                            </div>

                            <?php
                            if (!empty($successMessage)) {
                                echo '<div class="alert alert-success">' . $successMessage . '</div>';
                            } elseif (!empty($errorMessage)) {
                                echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
                            }

                            if (!empty($successMessagePassword)) {
                                echo '<div class="alert alert-success">' . $successMessagePassword . '</div>';
                            } elseif (!empty($errorMessagePassword)) {
                                echo '<div class="alert alert-danger">' . $errorMessagePassword . '</div>';
                            }
                            ?>

                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="systemName">System Name:</label>
                                        <input type="text" id="systemName" name="systemName" class="form-control"
                                            value="<?php echo isset($settings['system_name']) ? $settings['system_name'] : ''; ?>"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="logo">Logo:</label>
                                        <input type="file" id="logo" name="logo" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="currency">Currency:</label>
                                        <input type="text" id="currency" name="currency" class="form-control"
                                            value="<?php echo isset($settings['currency']) ? $settings['currency'] : ''; ?>"
                                            required>
                                    </div>

                                    <button type="submit" name="updateSettings" class="btn btn-primary">Update Settings</button>
                                </div>
                            </form>

                            <form method="post" action="">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="currentPassword">Current Password:</label>
                                        <input type="password" id="currentPassword" name="currentPassword" class="form-control"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="newPassword">New Password:</label>
                                        <input type="password" id="newPassword" name="newPassword" class="form-control"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="confirmPassword">Confirm Password:</label>
                                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control"
                                            required>
                                    </div>

                                    <button type="submit" name="changePassword" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>

    <footer class="main-footer">
    <strong> &copy; <?php echo date('Y');?> codeastro.com</a> -</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Developed By</b> <a href="https://codeastro.com/">CodeAstro</a>
    </div>
  </footer>
</div>

<?php include('includes/footer.php');?>


</body>
<!-- Visit codeastro.com for more projects -->
</html>
