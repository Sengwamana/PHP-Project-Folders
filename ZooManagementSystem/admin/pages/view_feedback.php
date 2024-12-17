<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}
$table = new Table('feedback');
if (isset($_GET['reviewed'])) {
    $feedback = $table->findInDatabase('f_reviewed', 'true');
} else {
    $feedback = $table->findInDatabase('f_reviewed', 'false');
}
$title = "Zoo System - Feedbacks";
$content = loadTemplate('../templates/view_feedback_template.php', ['feedback' => $feedback]);
