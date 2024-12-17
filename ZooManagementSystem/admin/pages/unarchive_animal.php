<?php
if(!isset($_GET['an_id'])){
    header('Location:view_animals?archived=true');
}
$animalTable = new Table('animals');
$data = [
    'animal_id'=>$_GET['an_id'],
    'an_archived'=>'false'
];
$animalTable->saveInDatabase($data, 'animal_id');
header('Location:view_animals?archived=true');
