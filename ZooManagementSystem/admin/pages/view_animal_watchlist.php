<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}
$animalTable = new Table('animals');
$watchlistTable = new Table('watchlist');
if (isset($_GET['attended'])) {
    $watchlists = $watchlistTable->findInDatabase('watch_attended', 'true');
} else {
    $watchlists = $watchlistTable->findInDatabase('watch_attended', 'false');
}

$getAnimalData = function ($animalId) {
    global $animalTable;
    $animalQ = $animalTable->findInDatabase('animal_id', $animalId);
    $animal = $animalQ->fetch();
    return $animal;
};

$classTable = new Table('classifications');

$getClassName = function ($classId) {
    global $classTable;
    $classQ = $classTable->findInDatabase('class_id', $classId);
    $class = $classQ->fetch();
    return $class['class_display_name'];
};

$animalImageTable = new Table('animal_images');
$getImageName = function ($animalId) {
    global $animalImageTable;
    $imageQ = $animalImageTable->findInDatabase('animal_id', $animalId);
    $images = $imageQ->fetchAll();
    $oneImageName = $images[0]['image_name'];
    return $oneImageName;
};

$title = "Zoo System - View Watchlist";
$content = loadTemplate('../templates/view_watchlist_template.php', [
    'watchlists' => $watchlists,
    'getAnimalData' => $getAnimalData,
    'getClassName' => $getClassName,
    'getImageName'=>$getImageName
]);
