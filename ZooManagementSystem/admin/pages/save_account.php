<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$adminTable = new Table('admin');

if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    if ($_POST['admin_id'] == "") {
        $_POST['admin_pass'] = password_hash($_POST['admin_pass'], PASSWORD_DEFAULT);
    }
    $adminTable->saveInDatabase($_POST, 'admin_id');


    if ($_POST['admin_id'] == $_SESSION['admin_id']) {
        $_SESSION['admin_name'] = $_POST['admin_name'];
        $_SESSION['admin_email'] = $_POST['admin_email'];
    }

    if ($_POST['admin_id'] == "")
        header('Location:save_account?msg=Registered Successfully');
    else
        header('Location:save_account?msg=Updated Successfully');
}

if (isset($_GET['account_id'])) {
    $accountQ = $adminTable->findInDatabase('admin_id', $_GET['account_id']);
    $account = $accountQ->fetch();
} else {
    $account = [];
}

$title = "Zoo System - Add Accounts";
$content = loadTemplate('../templates/save_account_template.php', ['account'=>$account]);
