<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$ticketTable = new Table('tickets');
$tickets = $ticketTable->findAllInDatabase();

$title = "Zoo System - Tickets";
$content = loadTemplate('../templates/tickets_template.php', ['tickets' => $tickets]);
