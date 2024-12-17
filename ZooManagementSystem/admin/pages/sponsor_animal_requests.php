<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$sponsorTable = new Table('sponsors');
$sponAnimalTable = new Table('sponsored_animals');
$animalTable = new Table('animals');

$sponsor_animals_pdo = $sponAnimalTable->findAllInDatabase();

$getSponsor = function ($sponsorId) {
    global $sponsorTable;
    $sponsorQ = $sponsorTable->findInDatabase('sponsor_id', $sponsorId);
    $sponsor = $sponsorQ->fetch();
    return $sponsor;
};

$getAnimalName = function ($animalId) {
    global $animalTable;
    $animal = $animalTable->findInDatabase('animal_id', $animalId);
    $data = $animal->fetch();
    return $data['an_given_name'];
};

$title = "Zoo System - Sponsor Animals";
$content = loadTemplate('../templates/sponsor_animal_requests_template.php', ['sponsor_animals_pdo'=>$sponsor_animals_pdo, 'getSponsor'=>$getSponsor, 'getAnimalName' => $getAnimalName]);
