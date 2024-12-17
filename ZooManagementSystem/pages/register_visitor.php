<?php
$visitorTable = new Table('visitors');
if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    if ($_POST['visitor_id'] == "") {
        $_POST['v_password'] = password_hash($_POST['v_password'], PASSWORD_DEFAULT);
    }
    $visitorTable->saveInDatabase($_POST, 'visitor_id');

    if ($_POST['visitor_id'] != "") {
        $_SESSION['v_firstname'] = $_POST['v_firstname'];
        $_SESSION['v_lastname'] = $_POST['v_lastname'];
        $_SESSION['v_email'] = $_POST['v_email'];
        $_SESSION['v_address'] = $_POST['v_address'];
    }

    if ($_POST['visitor_id'] == "")
        header('Location:register_visitor?msg=Registered Successfully');
    else
        header('Location:register_visitor?msg=Updated Successfully');
}
$title = "Zoo - Visitor Registration";
$content = loadTemplate('../templates/register_visitor_template.php', []);
