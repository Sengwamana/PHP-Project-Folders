<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$classTable = new Table('classifications');
if (isset($_GET['archived'])) {
    $classifications = $classTable->findInDatabase('class_archived', 'true');
} else {
    $classifications = $classTable->findInDatabase('class_archived', 'false');
}


$title = "Zoo System - View Classifications";
$content = loadTemplate('../templates/view_classifications_template.php', ['classifications'=>$classifications]);
