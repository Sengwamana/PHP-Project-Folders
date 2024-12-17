<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$empTable = new Table('employees');
$vacTable = new Table('vacancies');
$appTable = new Table('applications');
if (isset($_GET['archived'])) {
    $empQ = $empTable->findInDatabase('e_archived', 'true');
} else {
    $empQ = $empTable->findInDatabase('e_archived', 'false');
}

$employees = $empQ->fetchAll();

$getApplication = function($appId){
    global $appTable;
    $appQ = $appTable->findInDatabase('application_id', $appId);
    $app = $appQ->fetch();
    return $app;
};

$getVacancy = function($vacId){
    global $vacTable;
    $vacQ = $vacTable->findInDatabase('vacancy_id', $vacId);
    $vac = $vacQ->fetch();
    return $vac;
};

$title = "Zoo System - Dashboard";
$content = loadTemplate('../templates/view_employees_template.php', ['employees'=>$employees, 'getApplication'=>$getApplication, 'getVacancy'=>$getVacancy]);
