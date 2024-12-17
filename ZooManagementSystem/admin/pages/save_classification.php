<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}


$classTable = new Table('classifications');

if (isset($_GET['class_id'])) {
    $classQ = $classTable->findInDatabase('class_id', $_GET['class_id']);
    $classification = $classQ->fetch();
} else {
    $classification = [];
}

if (isset($_POST['submit'])) {
    unset($_POST['submit']);

    if (!isset($_POST['class_archived']))
        $_POST['class_archived'] = 'false';

    $classTable->saveInDatabase($_POST, 'class_id');
    header('Location:save_classification?msg=Classification Data Saved&type=success');
}

$title = "Zoo System - Save Classification";
$content = loadTemplate('../templates/classification_form_template.php', ['classification' => $classification]);
