<?php 

  include("db.php");
  include("auth.php");

  $id         = $_POST['id'];
  $lname      = $_POST['lname'];
  $fname      = $_POST['fname'];
  $gender     = $_POST['gender'];
  $division   = $_POST['division'];
  $emp_type   = $_POST['emp_type'];
  $contact    = $_POST['contact'];
  $address    = $_POST['address'];
  $email    = $_POST['email'];

  $sql = mysqli_query($conn,"UPDATE employee SET emp_type='$emp_type', lname='$lname', fname='$fname', gender='$gender', division='$division', contact='$contact', address='$address' , email='$email' WHERE emp_id='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Employee record has been updated');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Something went wrong!');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
?>