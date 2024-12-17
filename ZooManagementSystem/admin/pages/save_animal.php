<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

if ($_SESSION['role'] == "zookeeper") {
    header('Location:admin-home');
}

$classTable = new Table('classifications');
$classifications = $classTable->findInDatabase('class_archived', 'false');

$locationTable = new Table('locations');
$locations = $locationTable->findInDatabase('location_archived', 'false');

$mammalTable = new Table('mammals');
$birdTable = new Table('birds');
$fishTable = new Table('fish');
$reptileTable = new Table('reptiles');
$amphibianTable = new Table('amphibians');

$animalImageTable = new Table('animal_images');

//form submit event
if (isset($_POST['submit'])) {
    $archived;
    if (!isset($_POST['an_archived']))
        $archived = 'false';
    else
        $archived = $_POST['an_archived'];

    $common = [
        'animal_id' => $_POST['animal_id'],
        'an_given_name' => $_POST['an_given_name'],
        'an_species_name' => $_POST['an_species_name'],
        'an_dob' => $_POST['an_dob'],
        'an_gender' => $_POST['an_gender'],
        'an_avg_lifespan' => $_POST['an_avg_lifespan'],
        'location_id' => $_POST['location_id'],
        'an_dietary_req' => $_POST['an_dietary_req'],
        'an_natural_habitat' => $_POST['an_natural_habitat'],
        'an_pop_dist' => $_POST['an_pop_dist'],
        'an_joindate' => $_POST['an_joindate'],
        'an_height' => $_POST['an_height'],
        'an_weight' => $_POST['an_weight'],
        'an_description' => $_POST['an_description'],
        'class_id' => $_POST['class_id'],
        'an_med_record'=>$_POST['an_med_record'],
        'an_transfer'=>$_POST['an_transfer'],
        'an_transfer_reason'=>$_POST['an_transfer_reason'],
        'an_death_date'=>$_POST['an_death_date'],
        'an_death_cause'=>$_POST['an_death_cause'],
        'an_incineration'=>$_POST['an_incineration'],
        'an_archived' => $archived
    ];

    $animalTable = new Table('animals');
    $animalTable->saveInDatabase($common, 'animal_id');

    $lastInsertId = $animalTable->getLastInsertId();

    if ($_FILES['images']['name'][0] != "") {
        $aid = ($_POST['animal_id'] == "") ? $lastInsertId : $_POST['animal_id'];

        $animalImageTable->deleteFromDatabase('animal_id', $aid);

        $countImages = count($_FILES['images']['name']);

        for ($i = 0; $i < $countImages; $i++) {
            $fileName = pathinfo($_FILES['images']['name'][$i])['filename'];
            $newFileName = $fileName . '_' . time();
            $extension = pathinfo($_FILES['images']['name'][$i])['extension'];
            $fullName = $newFileName . '.' . $extension;
            // $_FILES['images']['name'][$i] . '_' . microtime()
            $imageRowData = [
                'animal_id' => $aid,
                'image_name' => $fullName
            ];
            $animalImageTable->insertInDatabase($imageRowData);
            move_uploaded_file($_FILES['images']['tmp_name'][$i], '../../img/animals/' . $fullName);
        }
    }

    $childTableNameExecuted = $classTable->findInDatabase('class_id', $_POST['class_id']);
    $childTableNameVar = $childTableNameExecuted->fetch();
    $childTableName = $childTableNameVar['class_table_name'];

    switch ($childTableName) {
        case 'mammals':
            $animalId;
            if ($_POST['animal_id'] == "") {
                $animalId = $lastInsertId;
            } else {
                $animalId = $_POST['animal_id'];
            }
            $data = [
                'animal_id' => $animalId,
                'm_gest_period' => $_POST['m_gest_period'],
                'm_category' => $_POST['m_category'],
                'm_avg_body_temp' => $_POST['m_avg_body_temp']
            ];
            $mammalTable->saveInDatabase($data, 'animal_id');
            header('Location:save_animal?msg=Animal Data Saved&type=success');
            break;

        case 'birds':
            $animalId;
            if ($_POST['animal_id'] == "") {
                $animalId = $lastInsertId;
            } else {
                $animalId = $_POST['animal_id'];
            }
            $data = [
                'animal_id' => $animalId,
                'b_nest_const' => $_POST['b_nest_const'],
                'b_clutch_size' => $_POST['b_clutch_size'],
                'b_wingspan' => $_POST['b_wingspan'],
                'b_ability_fly' => $_POST['b_ability_fly'],
                'b_color_variant' => $_POST['b_color_variant']
            ];
            $birdTable->saveInDatabase($data, 'animal_id');
            header('Location:save_animal?msg=Animal Data Saved&type=success');
            break;

        case 'fish':
            $animalId;
            if ($_POST['animal_id'] == "") {
                $animalId = $lastInsertId;
            } else {
                $animalId = $_POST['animal_id'];
            }
            $data = [
                'animal_id' => $animalId,
                'f_body_temp' => $_POST['f_body_temp'],
                'f_water_type' => $_POST['f_water_type'],
                'f_color_variant' => $_POST['f_color_variant']
            ];
            $fishTable->saveInDatabase($data, 'animal_id');
            header('Location:save_animal?msg=Animal Data Saved&type=success');
            break;

        case 'reptiles':
            $animalId;
            if ($_POST['animal_id'] == "") {
                $animalId = $lastInsertId;
            } else {
                $animalId = $_POST['animal_id'];
            }
            $data = [
                'animal_id' => $animalId,
                'r_rep_type' => $_POST['rep_type'],
                'r_clutch_size' => $_POST['clutch_size'],
                'r_num_offspring' => $_POST['num_offspring']
            ];
            $reptileTable->saveInDatabase($data, 'animal_id');
            header('Location:save_animal?msg=Animal Data Saved&type=success');
            break;

        case 'amphibians':
            $animalId;
            if ($_POST['animal_id'] == "") {
                $animalId = $lastInsertId;
            } else {
                $animalId = $_POST['animal_id'];
            }
            $data = [
                'animal_id' => $animalId,
                'am_rep_type' => $_POST['rep_type'],
                'am_clutch_size' => $_POST['clutch_size'],
                'am_num_offspring' => $_POST['num_offspring']
            ];
            $amphibianTable->saveInDatabase($data, 'animal_id');
            header('Location:save_animal?msg=Animal Data Saved&type=success');
            break;
        default:
            header('Location:save_animal?msg=Please create table for the selected classification&type=danger');
            break;
    }
}
//end of form submit

if (isset($_GET['an_id'])) {
    $animalTable = new Table('animals');
    $animalQ = $animalTable->findInDatabase('animal_id', $_GET['an_id']);
    $animal = $animalQ->fetch();

    $classQ = $classTable->findInDatabase('class_id', $animal['class_id']);
    $classData = $classQ->fetch();

    $childTable = new Table($classData['class_table_name']);
    $childQ = $childTable->findInDatabase('animal_id', $animal['animal_id']);
    $child = $childQ->fetch();
} else {
    $animal = [];
    $child = [];
}


$title = "Zoo System - Save Animal";
$content = loadTemplate('../templates/animal_form_template.php', [
    'classifications' => $classifications, 'locations' => $locations,
    'animal' => $animal, 'child' => $child
]);
