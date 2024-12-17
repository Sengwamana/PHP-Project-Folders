<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$locationTable = new Table('locations');
if (isset($_GET['archived'])) {
    $locations = $locationTable->findInDatabase('location_archived', 'true');
} else {
    $locations = $locationTable->findInDatabase('location_archived', 'false');
}

$title = "Zoo System - View Locations";
$content = loadTemplate('../templates/view_locations_template.php', ['locations' => $locations]);
