<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}
require '../../db/db_connect.php';
$animalTable = new Table('animals');
$animals = $animalTable->findInDatabase('an_archived', 'false');

$animalImageTable = new Table('animal_images');
$getImageName = function ($animalId) {
    global $animalImageTable;
    $imageQ = $animalImageTable->findInDatabase('animal_id', $animalId);
    $images = $imageQ->fetchAll();
    $oneImageName = $images[0]['image_name'];
    return $oneImageName;
};

$currentAnimalofWeekQ = $pdo->prepare("SELECT * FROM animal_of_the_week WHERE an_week_id=(SELECT MAX(an_week_id) FROM animal_of_the_week )");
$currentAnimalofWeekQ->execute();
if ($currentAnimalofWeekQ->rowCount() > 0) {
    $fetched = $currentAnimalofWeekQ->fetch();
    $currAnimalQ = $animalTable->findInDatabase('animal_id', $fetched['animal_id']);
    $currAnimal = $currAnimalQ->fetch();
} else {
    $currAnimal = null;
}


$classTable = new Table('classifications');
$classifications = $classTable->findInDatabase('class_archived', 'false');

$title = "Zoo System - Animal of the Week";
$content = loadTemplate('../templates/set_animal_of_the_week_template.php', [
    'animals' => $animals, 'classifications' => $classifications,
    'getImageName' => $getImageName, 'currAnimal' => $currAnimal
]);
