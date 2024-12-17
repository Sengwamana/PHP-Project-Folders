<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Payroll System</title>

  <link rel="stylesheet" href="assets/css/login.css">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<?php
  require('db.php');
  session_start();

  // If form is submitted, insert values into the database.
  if (isset($_POST['username'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      // Escaping special characters in the input strings
      $username = stripslashes($username);
      $username = mysqli_real_escape_string($connection, $username); // Add connection here

      $password = stripslashes($password);
      $password = mysqli_real_escape_string($connection, $password); // Add connection here

      // Checking if user exists in the database
      $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
      $result = mysqli_query($connection, $query) or die(mysqli_error($connection)); // Add connection here
      $rows = mysqli_num_rows($result);

      if($rows == 1) {
          $_SESSION['username'] = $username;
          header("Location: index.php");
      } else {
          ?>
          <script>
            alert('Login Invalid, please try again.');
            window.location.href='login.php';
          </script>
          <?php
      }
  } else {
?>

<br><br><br><br><br><br><br><br>
<div class="container">
  <section id="content">
    <form action="" method="post">
      <h1>Login Panel</h1>
      <div>
        <input name="username" type="text" placeholder="Username" required>
      </div>
      <div>
        <input name="password" type="password" placeholder="Password" required>
      </div>
      <div>
        <input type="submit" value="Login" />
      </div>
    </form><!-- form -->
  </section><!-- content -->
</div><!-- container -->

<?php } ?>

</body>
</html>
