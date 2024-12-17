<?php
require_once '../db/db_connect.php';
if (isset($_POST['submit'])) {
   if ($_POST['type'] == 'visitor') {
      $visitorTable = new Table('visitors');
      $visitor = $pdo->prepare("SELECT * FROM visitors WHERE v_email=:v_email AND v_archived=:v_archived");
      $cred = [
         'v_email' => $_POST['email'],
         'v_archived' => 'false'
      ];
      $visitor->execute($cred);
      if ($visitor->rowCount() > 0) {
         $data = $visitor->fetch();
         if (password_verify($_POST['password'], $data['v_password'])) {
            $_SESSION['visitor_id'] = $data['visitor_id'];
            $_SESSION['v_firstname'] = $data['v_firstname'];
            $_SESSION['v_lastname'] = $data['v_lastname'];
            $_SESSION['v_email'] = $data['v_email'];
            $_SESSION['v_address'] = $data['v_address'];
            $_SESSION['authenticated'] = true;
            $_SESSION['user_type'] = 'visitor';
            header("Location:home");
         } else {
            header('Location:login?msg=Incorrect Password');
         }
      } else {
         header('Location:login?msg=No account found');
      }
   } else if ($_POST['type'] == 'sponsor') {
      $sponsorTable = new Table('sponsors');
      $sponsor = $pdo->prepare("SELECT * FROM sponsors WHERE s_email=:s_email AND s_approved=:s_approved");
      $cred = [
         's_email' => $_POST['email'],
         's_approved' => 'true'
      ];
      $sponsor->execute($cred);
      if ($sponsor->rowCount() > 0) {
         $data = $sponsor->fetch();
         if (password_verify($_POST['password'], $data['s_password'])) {
            $_SESSION['sponsor_id'] = $data['sponsor_id'];
            $_SESSION['s_client_name'] = $data['s_client_name'];
            $_SESSION['s_existing_customer'] = $data['s_existing_customer'];
            $_SESSION['s_phone_number'] = $data['s_phone_number'];
            $_SESSION['s_client_address'] = $data['s_client_address'];
            $_SESSION['s_yearly_revenue'] = $data['s_yearly_revenue'];
            $_SESSION['s_business_type'] = $data['s_business_type'];
            $_SESSION['s_email'] = $data['s_email'];
            $_SESSION['authenticated'] = true;
            $_SESSION['user_type'] = 'sponsor';
            header("Location:home");
         } else {
            header('Location:login?msg=Incorrect Password');
         }
      } else {
         header('Location:login?msg=No account found');
      }
   }
}
$title = "Zoo - Login";
$content = loadTemplate('../templates/login_template.php', []);
