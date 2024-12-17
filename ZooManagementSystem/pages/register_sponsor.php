<?php
$sponsorTable = new Table('sponsors');
if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    if ($_POST['sponsor_id'] == "") {
        $_POST['s_password'] = password_hash($_POST['s_password'], PASSWORD_DEFAULT);
    }
    if ($_POST['sponsor_id'] != "") {
        $_SESSION['s_client_name'] = $_POST['s_client_name'];
        $_SESSION['s_existing_customer'] = $_POST['s_existing_customer'];
        $_SESSION['s_phone_number'] = $_POST['s_phone_number'];
        $_SESSION['s_client_address'] = $_POST['s_client_address'];
        $_SESSION['s_yearly_revenue'] = $_POST['s_yearly_revenue'];
        $_SESSION['s_business_type'] = $_POST['s_business_type'];
        $_SESSION['s_email'] = $_POST['s_email'];
    }
    $sponsorTable->saveInDatabase($_POST, 'sponsor_id');
    if ($_POST['sponsor_id'] == "")
        header('Location:register_sponsor?msg=Applied for registration. You can login after few hours.');
    else
        header('Location:register_sponsor?msg=Updated Successfully');
}

$title = "Zoo - Sponsor";
$content = loadTemplate('../templates/register_sponsor_template.php', []);
