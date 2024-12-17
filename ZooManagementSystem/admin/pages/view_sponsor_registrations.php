<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$sponsorTable= new Table('sponsors');
$sponsors_pdo = $sponsorTable->findAllInDatabase();

$title = "Zoo System - Sponsor Registrations";
$content = loadTemplate('../templates/view_sponsor_registrations_template.php', ['sponsors_pdo'=>$sponsors_pdo]);
