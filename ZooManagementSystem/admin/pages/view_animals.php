<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}
$animalTable = new Table('animals');
if (isset($_GET['archived'])) {
    $animals = $animalTable->findInDatabase('an_archived', 'true');
} else {
    $animals = $animalTable->findInDatabase('an_archived', 'false');
}

$locationTable = new Table('locations');

$getLocationName = function ($locationId) {
    global $locationTable;
    $var = $locationTable->findInDatabase('location_id', $locationId);
    $data = $var->fetch();
    return $data['location_name'];
};


$mammalTable = new Table('mammals');
$birdTable = new Table('birds');
$fishTable = new Table('fish');
$reptileTable = new Table('reptiles');
$amphibianTable = new Table('amphibians');

$getMammalData = function ($animalId) {
    global $mammalTable;
    $mammalData = $mammalTable->findInDatabase('animal_id', $animalId);
    $data = $mammalData->fetch();
    return $data;
};
$getBirdData = function ($animalId) {
    global $birdTable;
    $data = $birdTable->findInDatabase('animal_id', $animalId);
    $rdata = $data->fetch();
    return $rdata;
};
$getFishData = function ($animalId) {
    global $fishTable;
    $data = $fishTable->findInDatabase('animal_id', $animalId);
    $rdata = $data->fetch();
    return $rdata;
};
$getReptileData = function ($animalId) {
    global $reptileTable;
    $data = $reptileTable->findInDatabase('animal_id', $animalId);
    $rdata = $data->fetch();
    return $rdata;
};
$getAmphibianData = function ($animalId) {
    global $amphibianTable;
    $data = $amphibianTable->findInDatabase('animal_id', $animalId);
    $rdata = $data->fetch();
    return $rdata;
};

$classTable = new Table('classifications');
$classifications = $classTable->findInDatabase('class_archived', 'false');
$classifications2 = $classTable->findInDatabase('class_archived', 'false');

$animalImageTable = new Table('animal_images');
$getImageName = function ($animalId) {
    global $animalImageTable;
    $imageQ = $animalImageTable->findInDatabase('animal_id', $animalId);
    $images = $imageQ->fetchAll();
    $oneImageName = $images[0]['image_name'];
    return $oneImageName;
};

$title = "Zoo System - View Animals";
$content = loadTemplate(
    '../templates/view_animals_template.php',
    [
        'classifications' => $classifications,
        'classifications2' => $classifications2,
        'getLocationName' => $getLocationName,
        'animals' => $animals,
        'getMammalData' => $getMammalData,
        'getBirdData' => $getBirdData,
        'getFishData' => $getFishData,
        'getReptileData' => $getReptileData,
        'getAmphibianData' => $getAmphibianData,
        'getImageName'=>$getImageName
    ]
);
