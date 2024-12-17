<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$vacancyTable = new Table('vacancies');

if (isset($_GET['vacancy_id'])) {
    $vacancyQ = $vacancyTable->findInDatabase('vacancy_id', $_GET['vacancy_id']);
    $vacancy = $vacancyQ->fetch();
} else {
    $vacancy = [];
}

if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    if ($_POST['v_type'] == 'permanent')
        unset($_POST['v_end_date']);
    $vacancyTable->saveInDatabase($_POST, 'vacancy_id');
    header('Location: save_vacancy?msg=Vacancy saved successfully');
}


$title = "Zoo System - Vacancy";
$content = loadTemplate('../templates/vacancy_form_template.php', ['vacancy' => $vacancy]);
