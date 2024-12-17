<?php
require '../db/db_connect.php';
$animalTable = new Table('animals');

$currentAnimalofWeekQ = $pdo->prepare("SELECT * FROM animal_of_the_week WHERE an_week_id=(SELECT MAX(an_week_id) FROM animal_of_the_week )");
$currentAnimalofWeekQ->execute();
if ($currentAnimalofWeekQ->rowCount() > 0) {
    $fetched = $currentAnimalofWeekQ->fetch();
    $currAnimalQ = $animalTable->findInDatabase('animal_id', $fetched['animal_id']);
    $currAnimal = $currAnimalQ->fetch();
} else {
    $currAnimal = null;
}

$animalImageTable = new Table('animal_images');
$getImageName = function ($animalId) {
    global $animalImageTable;
    $imageQ = $animalImageTable->findInDatabase('animal_id', $animalId);
    $images = $imageQ->fetchAll();
    $oneImageName = $images[0]['image_name'];
    return $oneImageName;
};

$sponsorTable = new Table('sponsors');
$getSponsorName = function ($sponsorId) {
    global $sponsorTable;
    $sponsorQ = $sponsorTable->findInDatabase('sponsor_id', $sponsorId);
    $sponsor = $sponsorQ->fetch();
    return $sponsor['s_client_name'];
};
$testimonials = $pdo->prepare("SELECT * FROM testimonials ORDER BY posted_date DESC LIMIT 3");
$testimonials->execute();

$title = "Zoo - Homepage";
$content = loadTemplate('../templates/home_template.php', [
    'currAnimal' => $currAnimal, 'getImageName' => $getImageName,
    'testimonials'=>$testimonials, 'getSponsorName' => $getSponsorName
]);
