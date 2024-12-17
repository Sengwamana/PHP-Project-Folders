<?php
if (!isset($_SESSION['authenticated'])) {
    header("Location:admin_login");
}

$galleryTable = new Table('gallery');
$galleries_pdo = $galleryTable->findInDatabase('g_archived', 'false');

if (isset($_POST['submit_image'])) {
    unset($_POST['submit_image']);
    $fileName = pathinfo($_FILES['image']['name'])['filename'];
    $newFileName = $fileName . '_' . time();
    $extension = pathinfo($_FILES['image']['name'])['extension'];
    $fullName = $newFileName . '.' . $extension;
    $imageRowData = [
        'g_file_name' => $fullName,
        'g_file_type' => 'image'
    ];
    $galleryTable->insertInDatabase($imageRowData);
    move_uploaded_file($_FILES['image']['tmp_name'], '../../img/gallery/image/' . $fullName);
    header('Location:gallery?msg=Image Added');
}

if (isset($_POST['submit_video'])) {
    $fileName = pathinfo($_FILES['video']['name'])['filename'];
    $newFileName = $fileName . '_' . time();
    $extension = pathinfo($_FILES['video']['name'])['extension'];
    $fullName = $newFileName . '.' . $extension;
    $imageRowData = [
        'g_file_name' => $fullName,
        'g_file_type' => 'video'
    ];
    $galleryTable->insertInDatabase($imageRowData);
    // $filetarget = "../../img/gallery/video/" . basename($_FILES['video_name']['name']);
    move_uploaded_file($_FILES['video']['tmp_name'], '../../img/gallery/video/' . $fullName);

    header('Location:gallery?msg=Video Added');
}

$title = "Zoo System - Gallery";
$content = loadTemplate('../templates/gallery_template.php', ['galleries_pdo' => $galleries_pdo]);
