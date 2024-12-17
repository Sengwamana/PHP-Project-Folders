<?php
require_once '../db/db_connect.php';
// $galleryTable = new Table('gallery');
// $galleries = $galleryTable->findInDatabase('g_archived', 'false');

$galleryImage = $pdo->prepare('SELECT * FROM gallery WHERE g_file_type=:g_file_type AND g_archived=:g_archived');
$galleryImage->execute(['g_file_type' => 'image', 'g_archived' => 'false']);


$galleryVideo = $pdo->prepare('SELECT * FROM gallery WHERE g_file_type=:g_file_type AND g_archived=:g_archived');
$galleryVideo->execute(['g_file_type' => 'video', 'g_archived' => 'false']);

$title = "Zoo - Gallery";
$content = loadTemplate('../templates/gallery_template.php', ['galleryImage' => $galleryImage, 'galleryVideo' => $galleryVideo]);
