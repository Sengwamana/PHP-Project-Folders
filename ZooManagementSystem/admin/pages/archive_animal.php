<?php
if(!isset($_GET['an_id'])){
    header('Location:view_animals');
}
$animalTable = new Table('animals');
$data = [
    'animal_id'=>$_GET['an_id'],
    'an_archived'=>'true'
];
$animalTable->saveInDatabase($data, 'animal_id');
header('Location:view_animals');
