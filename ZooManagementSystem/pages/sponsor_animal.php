<?php
$sponsorAnimalTable = new Table('sponsored_animals');

if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    $_POST['animal_id'] = $_GET['an_id'];
    $_POST['sponsor_id'] = $_SESSION['sponsor_id'];

    $fileName = pathinfo($_FILES['image']['name'])['filename'];
    $newFileName = $fileName . '_' . time();
    $extension = pathinfo($_FILES['image']['name'])['extension'];
    $fullName = $newFileName . '.' . $extension;

    $_POST['signage_photo'] = $fullName;

    $price = $_POST['total_price'];
    $sBand;

    if ($price >= 500 && $price <= 1000)
        $sBand = 'E';
    else if ($price > 1000 && $price <= 1500)
        $sBand = 'D';
    else if ($price > 1500 && $price <= 2000)
        $sBand = 'C';
    else if ($price > 2000 && $price <= 2500)
        $sBand = 'B';
    else if ($price > 2500)
        $sBand = 'A';

    $_POST['sponsor_band'] = $sBand;

    $sponsorAnimalTable->insertInDatabase($_POST);

    move_uploaded_file($_FILES['image']['tmp_name'], '../img/sponsor_image/' . $fullName);
    header('Location:sponsor_animal?msg=Applied for sponsorship. Please wait until admin reviews your application');
}

$title = "Zoo - Sponsor";
$content = loadTemplate('../templates/sponsor_animal_template.php', []);
