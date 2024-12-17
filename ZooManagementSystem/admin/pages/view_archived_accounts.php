<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}
require_once '../../db/db_connect.php';

$accounts = $pdo->prepare('SELECT * FROM admin WHERE ad_archived=:ad_archived');
$accounts->execute([
    'ad_archived' => 'true'
]);

$title = "Zoo System - View Accounts";
$content = loadTemplate('../templates/view_archived_accounts_template.php', ['accounts' => $accounts]);
