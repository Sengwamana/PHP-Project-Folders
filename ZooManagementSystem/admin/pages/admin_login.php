<?php
require_once '../../db/db_connect.php';

if (isset($_POST['submit'])) {
    $adminTable = new Table('admin');
    // $admin = $adminTable->findInDatabase('admin_email', $_POST['email']);
    $admin = $pdo->prepare('SELECT * FROM admin WHERE admin_email=:admin_email AND ad_archived=:ad_archived');
    $admin->execute([
        'admin_email' => $_POST['email'],
        'ad_archived' => 'false'
    ]);
    if ($admin->rowCount() > 0) {
        $data = $admin->fetch();
        if (password_verify($_POST['password'], $data['admin_pass'])) {
            $_SESSION['admin_id'] = $data['admin_id'];
            $_SESSION['admin_name'] = $data['admin_name'];
            $_SESSION['admin_email'] = $data['admin_email'];
            $_SESSION['authenticated'] = true;
            $_SESSION['role'] = $data['role'];
            header("Location:admin-home");
        } else {
            header('Location:admin_login?msg=Incorrect Password');
        }
    } else {
        header('Location:admin_login?msg=No account found');
    }
}

$title = "Zoo System - Admin Login";
$content = loadTemplate('../templates/admin_login_template.php', []);

//save code
// $adminTable = new Table('admin');
// $array = [
//     'admin_name'=>'Admin',
//     'admin_email'=>'admin@claybrook.com',
//     'admin_pass'=> password_hash('admin123', PASSWORD_DEFAULT)
// ];
// $adminTable->saveInDatabase($array, 'admin_id');
