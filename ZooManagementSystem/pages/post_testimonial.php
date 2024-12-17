<?php
$testimonialTable = new Table('testimonials');
if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    $_POST['sponsor_id'] = $_SESSION['sponsor_id'];
    $testimonialTable->insertInDatabase($_POST);
    header('Location:post_testimonial?msg=Testimonial added successfully');
}
$title = "Zoo - Add Testimonial";
$content = loadTemplate('../templates/post_testimonial_template.php', []);
