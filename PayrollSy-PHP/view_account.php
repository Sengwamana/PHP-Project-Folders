<?php
  include("db.php"); // Include the database connection
  include("auth.php"); // Include authentication logic

  // Establish database connection
  $conn = mysqli_connect('localhost', 'root', '12345', 'payroll_s');

  if (!$conn) {
      die("Connection Failed: " . mysqli_connect_error());
  }

  // Execute the query and assign the result to $sql
  $sql = mysqli_query($conn, "SELECT * FROM deductions WHERE deduction_id='1'");

  if (!$sql) {
      die("Query Failed: " . mysqli_error($conn));
  }

  // Fetch and process rows
  while ($row = mysqli_fetch_array($sql)) {
      $healthinsurance = $row['healthinsurance'];
      $garnishments    = $row['garnishments'];
      $others          = $row['others'];
      $fica            = $row['fica'];
      $loans           = $row['loans'];

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
        <b><a href="index.php" style="text-decoration:none; color:#3fb1d4;"><img src="assets/img.png" alt="lg" width="28px;"> Payroll System</a></b>
            <a data-toggle="modal" style="text-decoration:none; color:#3fb1d4;" href="#colins" class="pull-right"><b><button class="btn btn-danger" style="border-radius: 0%;"><i class="fas fa-sign-out-alt"></i> Exit</button></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified" style="border-radius:0%">
            <li class="active">
              <a href="home_employee.php">Employee Section <span class="label label-primary"><?php include 'total_count.php'?></span></a>
            </li>
            <li>
              <a href="home_deductions.php">Manage Deductions</a>
            </li>
            <li>
              <a href="home_salary.php">Payroll Section</a>
            </li>
          </ul>
        </nav>
      </div><br><br>

      <?php
        $id=$_REQUEST['emp_id'];
        $query = "SELECT * from employee where emp_id='".$id."'";
        $result = mysqli_query($conn,$query) or die ( mysql_error());

        $query  = mysqli_query($conn,"SELECT * from overtime");
        while($row=mysqli_fetch_array($query))
        {
          $rate   = $row['rate'];
        }

        $query  = mysqli_query($conn,"SELECT * from salary");
        while($row=mysqli_fetch_array($query))
        {
          $salary   = $row['salary_rate'];
        }

        while ($row = mysqli_fetch_assoc($result))
        {
            $overtime     = $row['overtime'] * $rate;
            $bonus     = $row['bonus'];
            $deduction  = $row['deduction'];
            $income   = $overtime + $bonus + $salary;
            $netpay   = $income - $deduction;
          ?>

              <form class="form-horizontal" action="update_account.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['emp_id'];?>" />
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <h2><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?></h2>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Deduction/s  :</label>
                    <div class="col-sm-4">
                    <select name="deduction" class="form-control" required>
                      <option value=""><?php echo $row['deduction'];?></option>
                      <option value="<?php echo $healthinsurance; ?>">Health-Insurance</option>
                      <option value="<?php echo $garnishments; ?>">Garnishments</option>
                      <option value="<?php echo $others; ?>">Others</option>
                      <option value="<?php echo $fica; ?>">FICA</option>
                      <option value="<?php echo $loans; ?>">Loans</option>
                    </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Overtime (hours)  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="overtime" class="form-control" value="<?php echo $row['overtime'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Bonus Amount:</label>
                    <div class="col-sm-4">
                      <input type="text" name="bonus" class="form-control" value="<?php echo $row['bonus'];?>" required="required">
                    </div>
                  </div><br>

                  <div class="form-group">
                    <label class="col-lg-6 control-label">Net Pay  : <?php echo $netpay;?>.00</label>
                    
                  </div><br><br>
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" style="border-radius:0%" value="Update" class="btn btn-danger">
                      <a href="home_employee.php" style="border-radius:0%" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
              </form>
            <?php
          }
        ?>

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