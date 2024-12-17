<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

require '../../db/db_connect.php';

$animalQ = $pdo->prepare("SELECT COUNT(animal_id) as count_animal FROM animals WHERE an_archived='false'");
$animalQ->execute();
$animal = $animalQ->fetch();

$sponsorPriceQ = $pdo->prepare("SELECT SUM(total_price) as total_price FROM sponsored_animals WHERE s_status='accepted'");
$sponsorPriceQ->execute();
$sponsorPrice = $sponsorPriceQ->fetch();

$sponsorQ = $pdo->prepare("SELECT COUNT(sponsor_id) as total_sponsor FROM sponsors WHERE s_approved='true'");
$sponsorQ->execute();
$sponsor = $sponsorQ->fetch();

$vacancyQ = $pdo->prepare("SELECT COUNT(vacancy_id) as total_vacancies FROM vacancies WHERE v_archived='false' AND v_status='available' ");
$vacancyQ->execute();
$vacancy = $vacancyQ->fetch();

$ticketsQ = $pdo->prepare("SELECT COUNT(ticket_id) as total_tickets FROM tickets ");
$ticketsQ->execute();
$tickets = $ticketsQ->fetch();

$visitorsQ = $pdo->prepare("SELECT COUNT(visitor_id) as total_visitors FROM visitors WHERE v_archived='false' ");
$visitorsQ->execute();
$visitors = $visitorsQ->fetch();

$unfeedbacksQ = $pdo->prepare("SELECT COUNT(feedback_id) as total_unfeedbacks FROM feedback WHERE f_reviewed='false' ");
$unfeedbacksQ->execute();
$unfeedbacks = $unfeedbacksQ->fetch();

$refeedbacksQ = $pdo->prepare("SELECT COUNT(feedback_id) as total_refeedbacks FROM feedback WHERE f_reviewed='true' ");
$refeedbacksQ->execute();
$refeedbacks = $refeedbacksQ->fetch();

$jobapplicationQ = $pdo->prepare("SELECT COUNT(application_id) as total_jobapplication FROM applications WHERE a_status='unreviewed' ");
$jobapplicationQ->execute();
$jobapplication = $jobapplicationQ->fetch();

$pendingsponsorQ = $pdo->prepare("SELECT COUNT(sponsor_id) as total_pendingsponsor FROM sponsors WHERE s_approved='false' ");
$pendingsponsorQ->execute();
$pendingsponsor = $pendingsponsorQ->fetch();

$eventsQ = $pdo->prepare("SELECT COUNT(event_id) as total_events FROM events ");
$eventsQ->execute();
$events = $eventsQ->fetch();

$totalusersQ = $pdo->prepare("SELECT COUNT(admin_id) as total_users FROM admin ");
$totalusersQ->execute();
$totalusers = $totalusersQ->fetch();


$title = "Zoo System - Dashboard";
$content = loadTemplate('../templates/admin-home_template.php', [
    'animal' => $animal,
    'sponsorPrice' => $sponsorPrice,
    'sponsor' => $sponsor,
    'vacancy' => $vacancy,
    'tickets' => $tickets,
    'visitors' => $visitors,
    'unfeedbacks' => $unfeedbacks,
    'refeedbacks' => $refeedbacks,
    'jobapplication' => $jobapplication,
    'pendingsponsor' => $pendingsponsor,
    'events' => $events,
    'totalusers' =>$totalusers
]);
