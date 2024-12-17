<?php
  $conn = mysqli_connect('localhost', 'root', '12345');
  if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
  }

  // Corrected mysqli_select_db() usage
  $select_db = mysqli_select_db($conn, 'payroll_s');
  if (!$select_db) {
    die("Database Selection Failed: " . mysqli_error($conn));
  }

  if(isset($_POST['submit']) != "") {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];
    $contact    = $_POST['contact'];
    $address    = $_POST['address'];
    $email      = $_POST['email'];

    // Corrected mysqli_query() usage
    $sql = mysqli_query($conn, "INSERT INTO employee (lname, fname, gender, emp_type, division, contact, address, email) 
                                VALUES ('$lname', '$fname', '$gender', '$type', '$division', '$contact', '$address', '$email')");

    if($sql) {
      ?>
        <script>
            alert('Employee has been added!');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    } else {
      ?>
        <script>
            alert('An Error Occurred');
            window.location.href='index.php';
        </script>
      <?php 
    }
  }
?>
