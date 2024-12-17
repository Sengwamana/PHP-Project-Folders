<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}
require '../../db/db_connect.php';

$vTable = new Table('vacancies');
$vacancies = $pdo->prepare("SELECT * FROM vacancies WHERE v_archived='false' AND v_status='available'");
$vacancies->execute();


$title = "Zoo System - View Vacancies";
$content = loadTemplate('../templates/view_vacancies_template.php', ['vacancies'=>$vacancies]);
