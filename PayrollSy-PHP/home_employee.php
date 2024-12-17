<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_employee.php");

  // Create a connection
  $conn = mysqli_connect('localhost', 'root', '12345', 'payroll_s');
  
  // Check if connection is successful
  if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
  }

  // No need to call mysqli_select_db() anymore
  // We have already selected the database during the connection creation

  // The rest of your code goes here...

 
  // Assuming $conn is already defined and connected to the database
  $sql = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id='1'");

  while ($row = mysqli_fetch_array($sql)) { // Use mysqli_fetch_array() instead of mysql_fetch_array()
      $healthinsurance = $row['healthinsurance'];
      $garnishments = $row['garnishments'];
      $others = $row['others'];
      $fica = $row['fica'];
      $loans = $row['loans'];
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title>Payroll System</title>


    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index.php" style="text-decoration:none; color:#3fb1d4;"> <img src="assets/img.png" alt="lg" width="28px;"> Payroll System</a></b>
            <a data-toggle="modal" style="text-decoration:none; color:#3fb1d4;" href="#colins" class="pull-right"><b><button class="btn btn-danger" style="border-radius: 0%;"><i class="fas fa-sign-out-alt"></i> Exit</button></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified" style="border-radius:0%">
            <li class="active">
              <a href="">Employee Section <span class="label label-danger"><?php include 'total_count.php'?></span></a>
            </li>
            <li>
              <a href="home_deductions.php">Manage Deductions</a>
            </li>
            <li>
              <a href="home_salary.php">Payroll Section</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-info" style="border-radius:0%"><i class="fa fa-user-plus"></i> Add Employee Records</button>
                <p align="center"><big><b>Employee Records </b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr>
                          <th><p align="center">Fullname</p></th>
                          <th><p align="center">Contact</p></th>
                          <th><p align="center">Email</p></th>
                          <th><p align="center">Gender</p></th>
                          <th><p align="center">Employee Type</p></th>
                          <th><p align="center">Department</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                      
  // Create a connection
  $conn = mysqli_connect('localhost', 'root', '12345', 'payroll_s');
  
  // Check if connection is successful
  if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
  }

  // No need to call mysqli_select_db() anymore
  // We have already selected the database during the connection creation

  // The rest of your code goes here...

                          $query=mysqli_query($conn,"select * from employee ORDER BY emp_id asc")or die(mysql_error());
                          while($row=mysqli_fetch_array($query))
                          {
                            $id     =$row['emp_id'];
                            $lname  =$row['lname'];
                            $fname  =$row['fname'];
                            $type   =$row['emp_type'];
                            $deduction   =$row['deduction'];
                            $overtime   =$row['overtime'];
                            $bonus   =$row['bonus'];
                        ?>

                        <tr>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" style="text-decoration:none; color: #0b3f75;" title="Update"><?php echo $row['fname'] ?>  <?php echo $row['lname'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" style="text-decoration:none; color: #0b3f75;" title="Update"><?php echo $row['contact'] ?></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" style="text-decoration:none; color: #0b3f75;" title="Update"><?php echo $row['email'] ?></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" style="text-decoration:none; color: #8c0423;" title="Update"><?php if ($row['gender'] == 'Male') { echo '<i class="fas fa-male"></i> M'; } else { echo '<i class="fas fa-female"></i> F'; } ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" style="text-decoration:none; color: #0b3f75;" title="Update"><?php if ($row['emp_type'] == 'Shiftworker') { echo '<span class="label label-primary">'.$row["emp_type"].'</span>'; } else if ($row['emp_type'] == 'Full-Time') { echo '<span class="label label-danger">'.$row["emp_type"].'</span>'; } else if ($row['emp_type'] == 'Part-Time') { echo '<span class="label label-warning">'.$row["emp_type"].'</span>'; } else { echo '<span class="label label-success">'.$row["emp_type"].'</span>'; } ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" style="text-decoration:none; color: #0b3f75;" title="Update"><?php echo $row['division'] ?></a></td>
                          <td align="center">
                            <a class="btn btn-warning" style="border-radius:60px;" href="view_account.php?emp_id=<?php echo $row["emp_id"]; ?>"><i class="fa fa-file-invoice"></i></a>
                            <a class="btn btn-danger" style="border-radius:60px;" href="delete.php?emp_id=<?php echo $row["emp_id"]; ?>"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                      
                        
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an EMPLOYEE -->
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add New Employee</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
              <div class="form-group">
                  <label class="col-sm-4 control-label">Firstname</label>
                  <div class="col-sm-8">
                    <input type="text" name="fname" class="form-control" placeholder="Firstname" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Lastname</label>
                  <div class="col-sm-8">
                    <input type="text" name="lname" class="form-control" placeholder="Lastname" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Gender</label>
                  <div class="col-sm-8">
                    <select name="gender" class="form-control" placeholder="Gender" required>
                      <option value="">Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Contact</label>
                  <div class="col-sm-8">
                    <input type="number" name="contact" class="form-control" placeholder="Contact Number" required>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-4 control-label">Residential Address</label>
                  <div class="col-sm-8">
                    <input type="text" name="address" class="form-control" placeholder="Residential Address" required>
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-4 control-label">Employee Type</label>
                  <div class="col-sm-8">
                    <select name="emp_type" class="form-control" placeholder="Employee Type" required>
                      <option value="">Employee Type</option>
                      <option value="Part-Time">Part-Time</option>
                      <option value="Full-Time">Full-Time</option>
                      <option value="Shiftworker">Shiftworker</option>
                      <option value="Casual">Casual</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Department</label>
                  <div class="col-sm-8">
                    <select name="division" class="form-control" placeholder="Division" required>
                      <option value="">Please Select...</option>
                      <option value="Finance">Finance</option>
                      <option value="Marketing">Marketing</option>
                      <option value="Purchase">Purchase</option>
                      <option value="Personnel">Personnel</option>
                      <option value="Maintenance">Maintenance</option>
                      <option value="Control">Control</option>
                      <option value="Admin">Admin</option>
                      <option value="Human Resource">Human Resource</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <button type="submit" name="submit" class="btn btn-success" style="border-radius:60px;"> <i class="fa fa-check "></i> Insert</button>
                    <button type="reset" name="" class="btn btn-danger" style="border-radius:60px;"> <i class="fa fa-times "></i> Reset</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>