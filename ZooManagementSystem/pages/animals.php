<?php
require_once '../db/db_connect.php';
$classTable = new Table('classifications');

$classId=$_GET['class_id'];

$animalTable = new Table('animals');
$animals = $pdo->prepare("SELECT * FROM animals WHERE an_archived='false' AND class_id='$classId'");
$animals->execute();

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


$title = "Zoo - Animals";
$content = loadTemplate('../templates/animals_template.php', [
    'animals' => $animals,
    'getClassName'=>$getClassName,
    'getImageName'=>$getImageName
]);
