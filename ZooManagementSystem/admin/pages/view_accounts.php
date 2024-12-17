<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}
require_once '../../db/db_connect.php';

$type = $_GET['type'];

$accounts = $pdo->prepare('SELECT * FROM admin WHERE role=:a_role AND ad_archived=:ad_archived');
$accounts->execute([
    'a_role' => $type,
    'ad_archived' => 'false'
]);

$title = "Zoo System - View Accounts";
$content = loadTemplate('../templates/view_accounts_template.php', ['accounts' => $accounts]);
