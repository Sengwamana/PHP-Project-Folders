<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$appTable = new Table('applications');
$applications_pdo = $appTable->findAllInDatabase();

$vacancyTable = new Table('vacancies');

$getVacancyPosition = function($vacancyId){
    global $vacancyTable;
    $vacancyQ = $vacancyTable->findInDatabase('vacancy_id', $vacancyId);
    $vacancy = $vacancyQ->fetch();
    return $vacancy['v_position'];
};


$title = "Zoo System - View Applications";
$content = loadTemplate('../templates/view_applications_template.php', ['applications_pdo'=>$applications_pdo, 'getVacancyPosition' => $getVacancyPosition]);
