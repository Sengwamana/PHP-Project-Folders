<?php
require '../db/db_connect.php';

$applicationTable = new Table('applications');
if (isset($_POST['submit'])) {
    unset($_POST['submit']);

    $fileName = pathinfo($_FILES['cv']['name'])['filename'];
    $newFileName = $fileName . '_' . time();
    $extension = pathinfo($_FILES['cv']['name'])['extension'];
    $fullName = $newFileName . '.' . $extension;

    $_POST['a_cv'] = $fullName;
    move_uploaded_file($_FILES['cv']['tmp_name'], '../files/cv/' . $fullName);

    $_POST['vacancy_id'] = $_GET['vac_id'];

    $applicationTable->insertInDatabase($_POST);
    header('Location:apply_vacancy?msg= Application received. You\'ll be contacted after few days');

}

$title = "Zoo - Apply for Vacancy";
$content = loadTemplate('../templates/apply_vacancy_template.php', []);
