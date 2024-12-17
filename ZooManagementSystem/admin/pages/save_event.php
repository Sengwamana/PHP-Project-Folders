<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$eventsTable = new Table('events');

if (isset($_GET['event_id'])) {
    $eventQ = $eventsTable->findInDatabase('event_id', $_GET['event_id']);
    $event = $eventQ->fetch();
} else {
    $event = [];
}

if (isset($_POST['submit'])) {
    unset($_POST['submit']);

    if ($_FILES['image']['name'] != "") {
        $fileName = pathinfo($_FILES['image']['name'])['filename'];
        $newFileName = $fileName . '_' . time();
        $extension = pathinfo($_FILES['image']['name'])['extension'];
        $fullName = $newFileName . '.' . $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], '../../img/event/' . $fullName);
        $_POST['event_image'] = $fullName;
    }

    $eventsTable->saveInDatabase($_POST, 'event_id');
    header('Location:save_event?msg=Event saved successfully');
}

$title = "Zoo System - Save Event";
$content = loadTemplate('../templates/save_event_template.php', ['event' => $event]);
