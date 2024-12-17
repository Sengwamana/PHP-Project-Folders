<?php
session_start();
require_once '../../db/db_connect.php';
require_once '../../classes/table.php';
require_once '../../functions/functions.php';
if (isset($_GET['page'])) {
    require_once '../pages/' . $_GET['page'] . '.php';
} else {
    require_once '../pages/admin-home.php';
}

$variables = [
    'title' => $title,
    'content' => $content
];

if (isset($_GET['page']) && $_GET['page'] == 'admin_login') {
    echo loadTemplate('../templates/admin_login_layout.php', $variables);
} else {
    echo loadTemplate('../templates/admin-layout.php', $variables);
}
