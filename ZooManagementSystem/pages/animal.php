<?php
require_once '../db/db_connect.php';
$classTable = new Table('classifications');
$animalImageTable = new Table('animal_images');
$animalTable = new Table('animals');

$animalQ = $animalTable->findInDatabase('animal_id', $_GET['an_id']);
$animal = $animalQ->fetch();
$classQ = $classTable->findInDatabase('class_id', $animal['class_id']);
$class = $classQ->fetch();

$childTable = new Table($class['class_table_name']);
$childDetailsQ = $childTable->findInDatabase('animal_id', $animal['animal_id']);
$childDetails = $childDetailsQ->fetch();

$images = $animalImageTable->findInDatabase('animal_id', $animal['animal_id']);

$getClassName = function ($classId) {
    global $classTable;
    $classQ = $classTable->findInDatabase('class_id', $classId);
    $class = $classQ->fetch();
    return $class['class_display_name'];
};

$locationTable = new Table('locations');

$getLocationName = function ($locationId) {
    global $locationTable;
    $var = $locationTable->findInDatabase('location_id', $locationId);
    $data = $var->fetch();
    return $data['location_name'];
};

$sponsoredQ = $pdo->prepare('SELECT * FROM sponsored_animals WHERE animal_id=:animal_id AND s_status=:s_status');
$sData = [
    'animal_id' => $_GET['an_id'],
    's_status' => 'accepted'
];
$sponsoredQ->execute($sData);
if ($sponsoredQ->rowCount() > 0) {
    $sponsored = true;
    $sponsorDetails = $sponsoredQ->fetch(); 
} else {
    $sponsored = false;
    $sponsorDetails = [];
}

$title = "Zoo - Animals";
$content = loadTemplate('../templates/animal_template.php', [
    'animal' => $animal,
    'class' => $class,
    'childDetails' => $childDetails,
    'images' => $images,
    'getLocationName' => $getLocationName,
    'getClassName' => $getClassName,
    'sponsored'=>$sponsored,
    'sponsorDetails'=>$sponsorDetails
]);
