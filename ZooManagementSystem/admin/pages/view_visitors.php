<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}
$visitorTable = new Table('visitors');
if (isset($_GET['archived'])) {
    $vistors = $visitorTable->findInDatabase('v_archived', 'true');
} else {
    $vistors = $visitorTable->findInDatabase('v_archived', 'false');
}
$title = "Zoo System - Visitors";
$content = loadTemplate('../templates/view_visitors_template.php', ['visitors' => $vistors]);
