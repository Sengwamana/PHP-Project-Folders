<?php 

  include("db.php");
  include("auth.php");

  $id           = $_POST['id'];
  $deduction    = $_POST['deduction'];
  $overtime     = $_POST['overtime'];
  $bonus        = $_POST['bonus'];

  $sql = mysql_query($connection,"UPDATE employee SET deduction='$deduction', overtime='$overtime', bonus='$bonus' WHERE emp_id='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Account has been updated!');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
  else
  {
    echo "Something went wrong, Please try again!";
  }
?>