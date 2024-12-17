<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$eventTable = new Table('events');
if (isset($_GET['archived'])) {
    $events = $eventTable->findInDatabase('event_archived', 'true');
} else {
    $events = $eventTable->findInDatabase('event_archived', 'false');
}

$title = "Zoo System - Tickets";
$content = loadTemplate('../templates/view_events_template.php', ['events' => $events]);
