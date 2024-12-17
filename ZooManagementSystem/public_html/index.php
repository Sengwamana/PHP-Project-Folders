<?php
session_start();
require_once '../db/db_connect.php';
require_once '../classes/table.php';
require_once '../functions/functions.php';
if (isset($_GET['page'])) {
    require_once '../pages/' . $_GET['page'] . '.php';
} else {
    require_once '../pages/home.php';
}

$variables = [
    'title' => $title,
    'content' => $content
];

echo loadTemplate('../templates/layout.php', $variables);
