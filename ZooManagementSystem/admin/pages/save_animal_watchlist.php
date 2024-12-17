<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$animalTable = new Table('animals');
$animals = $animalTable->findInDatabase('an_archived', 'false');

$classTable = new Table('classifications');

$getClassName = function ($classId) {
    global $classTable;
    $classQ = $classTable->findInDatabase('class_id', $classId);
    $class = $classQ->fetch();
    return $class['class_display_name'];
};

$watchlistTable = new Table('watchlist');

if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    $_POST['watch_attended'] = 'false';
    $_POST['watch_date'] = date("Y-m-d");

    $watchlistTable->insertInDatabase($_POST);
    header('Location:save_animal_watchlist?msg=Animal added to watchlist');
}

$title = "Zoo System - Watchlist";
$content = loadTemplate('../templates/animal_watchlist_form.php', [
    'animals' => $animals,
    'getClassName' => $getClassName
]);
