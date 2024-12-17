<?php
$eventsTable = new Table('events');
$events = $eventsTable->findInDatabase('event_archived', 'false');

$title = "Zoo - Events";
$content = loadTemplate('../templates/events_template.php', ['events' => $events]);
