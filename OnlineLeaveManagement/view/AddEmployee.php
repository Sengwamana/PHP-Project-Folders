<?php include("../model/EmployeeModel.php");

	if(isset($_SESSION['officeUserName']))
	{
		if ($_SESSION['empType'] == 2 || $_SESSION['empType'] == 1)
	{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Leave Application</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link href="../assets/css/simple-sidebar.css" rel="stylesheet">
	
	<!-- Online FA CDN -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script language=JavaScript>
		
		function reload(form)
			{
				var val=form.cat.options[form.cat.options.selectedIndex].value;
				self.location='AddEmployee.php?cat=' + val ;
			}
			
	</script>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="LeaveApplication.php">Online Leave Application</a>
                </li>
				<li>
                    <a href="UserProfile.php"><i class="fas fa-user-circle"></i> User Profile</a>
                </li>
					<?php
					$objLeaveApplication = new Employee();
					$result = $objLeaveApplication->getForRecomandationNumber();
					while($row = mysqli_fetch_array($result))
					{ 
					?>
                <li>
                    <a href="Applications.php"><i class="fas fa-sign-out-alt"></i> Applications <span style="color:red"><?php if($row['COUNT(lIsRecomanded)'] != 0){ ?>[ New <?php echo $row['COUNT(lIsRecomanded)']; ?> ]<?php } ?></span></a>
                </li>
					<?php
					}
					$objLeaveApplication = new Employee();
					$result = $objLeaveApplication->getRecomandationNumber();
					while($row = mysqli_fetch_array($result))
					{ 
					?>
				<li>
                    <a href="RecomandedApplications.php"><i class="fas fa-share"></i> Recommended Applications<span style="color:red"><?php if($row['COUNT(lIsRecomanded)'] != 0){ ?><?php echo $row['COUNT(lIsRecomanded)']; ?><?php } ?></span></a>
                </li>
					<?php
					}
					?>
                <li>
                    <a href="AddDepartment.php"><i class="fas fa-plus"></i> Add Department</a>
                </li>
                <li>
                    <a href="ListDepartment.php"><i class="fas fa-stream"></i> List Department</a>
                </li>
                <li>
                    <a href="AddDesignation.php"><i class="fas fa-plus"></i> Add Designation</a>
                </li>
				<li>
                    <a href="ListDesignation.php"><i class="fas fa-stream"></i> List Designation</a>
                </li>
                <li>
                    <a style="color:#DAA520;" href="AddEmployee.php"><i class="fas fa-plus"></i> Add Employee</a>
                </li>
				<li>
                    <a href="ListEmployee.php"><i class="fas fa-stream"></i> List Employee</a>
                </li>
				<li>
                    <a href="UsersLeaveDetails.php"><i class="fas fa-clipboard-list"></i> User's Leave Details</a>
                </li>
                <li>
                    <a href="ListOfUserBlood.php"><i class="fas fa-heartbeat"></i> Blood Group</a>
                </li>
                <li>
                    <a href="../controller/LogoutController.php"><i class="fas fa-power-off"></i> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><i class="fas fa-exchange-alt"></i> Menu Bar</a>
                        <h1 align="center">Add Employee</h1>
						
						<?php
						
							@$cat=$_GET['cat']; 
							// Use this line or below line if register_global is off
							
							if(strlen($cat) > 0 and !is_numeric($cat))
							{ 	
								// to check if $cat is numeric data or not. 
								echo "Data Error";
								exit;
							}
							
							///////// Getting the data from Mysql table for first list box//////////
							$objEmployee = new Employee();
							$dptResult = $objEmployee->getAllDptDesi();
							$bloodResult = $objEmployee->allBloodInfo();
							
							///////////// End of query for first list box////////////

							/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
							if(isset($cat) and strlen($cat) > 0)
							{
								$objEmployee = new Employee();
								$desiResult = $objEmployee->getSingleDptDesi($cat);
							}
							else
							{
								$objEmployee = new Employee();
								$desiResult = $objEmployee->getAllDesi();
							}
						//////////////////  This will end the second drop down list ///////////
						
						?>
						
						<?php
						
							if (isset($_SESSION['msgForEmpCreate']))
							{
								if ($_SESSION['msgForEmpCreate'] == 1)
								{												
									unset($_SESSION['msgForEmpCreate']);
									?>
									<h3 align="center">Employee Added Successfully</h3>
								
									<div class="table-responsive">
									
										<table class="table table-bordered table-hover table-striped">
										
											<thead>
											
												<tr class="success">
													<th>Employee Code</th>
													<th>Name</th>
													<th>Department</th>
													<th>Designation</th>
												</tr>
												
											</thead>
											
											<tbody>
								
												<?php
												$objEmployee = new Employee();
												$singleResult = $objEmployee->getSingleEmployee();
												while($row = mysqli_fetch_array($singleResult))
												{ 
												?>
													<tr>
														<td><?php echo $row['eEmployeeCodeNumber'] ?></td>
														<td><?php echo $row['eFirstName']." ".$row['eLastName'] ?></td>
														<td><?php echo $row['dptName'] ?></td>
														<td><?php echo $row['desiDesignationName'] ?></td>
													</tr>
												<?php
												}
												?>
												
											</tbody>
											
										</table>
										
									</div>	
									
									<?php
								}
								else
								{
									unset($_SESSION['msgForEmpCreate']);
									?>
									<?php
								}
							}
							else
							{
								?>
								<?php
							}
							
						?>
						
						<form role="form" action="../controller/AddEmployeeController.php" method="post" >
							
							<div class="form-group">
						
								<label for="empDptName">Employee Department: </label>
								<?php
								echo "<select class='form-control' name='cat' id='empDptName' onchange=\"reload(this.form)\">";	
								
										while ($row = mysqli_fetch_array($dptResult))
										{
											if($row['dptId']==@$cat)
											{
												?>
													<option selected value='<?php echo $row['dptId']; ?>'><?php echo $row['dptName']; ?></option>
												<?php
											}
											else
											{
												?>
													<option value='<?php echo $row['dptId']; ?>'><?php echo $row['dptName']; ?></option>
												<?php
											}
										}
								echo "</select>";
								?>
								
								
							</div>
							
							<div class="form-group">
								
								<label for="empDesiName">Employee Designation: </label>
								<?php
								echo "<select class='form-control' name='subcat' id='empDesiName'>";
								
										while ($row2 = mysqli_fetch_array($desiResult))
										{ 
											?>
												<option value='<?php echo $row2['desiId']; ?>'><?php echo $row2['desiDesignationName']; ?></option>
											<?php
										}
									echo "</select>";
								?>
								
							</div>
							
							<div class="form-group">
						
								<label for="empCodeNum">Employee Code Number: </label>
								<input type="text" class="form-control" placeholder="Employee Code Number ...." name="empCodeNum" id="empCodeNum">
							
							</div>
							
							<div class="form-group">
						
								<label for="empEmailAddress">Email Address: </label>
								<input type="email" class="form-control" placeholder="Employee Email Address ...." name="empEmailAddress" id="empEmailAddress" >
							
							</div>
							
							<div class="form-group">
						
								<label for="empLoginPass">Employee Login Password: </label>
								<input type="password" class="form-control" placeholder="Employee Login Password ...." name="empLoginPass" id="empLoginPass" >
							
							</div>
							
							<div class="form-group">
						
								<label for="empFirstName">First Name: </label>
								<input type="text" class="form-control" placeholder="Employee First Name ...." name="empFirstName" id="empFirstName" >
							
							</div>
							
							<div class="form-group">
						
								<label for="empLastName">Last Name: </label>
								<input type="text" class="form-control" placeholder="Employee Last Name ...." name="empLastName" id="empLastName" >
							
							</div>
							
							<div class="form-group">
						
								<label for="empDoB">Date Of Birth: </label>
								<input type="date" class="form-control" placeholder="Employee Date Of Birth ...." name="empDoB" id="empDoB" >
							
							</div>
							
							<div class="form-group">
						
								<label for="empBloodGroup">Blood Group: </label>
								<?php
								echo "<select class='form-control' name='empBloodGroup' id='empBloodGroup'>";
								
										while ($bloodRow = mysqli_fetch_array($bloodResult))
										{ 
											?>
												<option value='<?php echo $bloodRow['bId']; ?>'><?php echo $bloodRow['bName']; ?></option>
											<?php
										}
									echo "</select>";
								?>
								
							</div>
							
							<div class="form-group">
						
								<label for="empGender">Gender: </label>
								<select class="form-control" name="empGender" id="empGender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								
							</div>
							
							<div class="form-group">
						
								<label for="empPhoneNumPersonal">Phone Number (Personal): </label>
								<input type="text" class="form-control" placeholder="Employee Phone Number ...." name="empPhoneNumPersonal" id="empPhoneNumPersonal" >
							
							</div>
							
							<div class="form-group">
						
								<label for="empPhoneNumOffice">Phone Number (Office): </label>
								<input type="text" class="form-control" placeholder="Employee Phone Number ...." name="empPhoneNumOffice" id="empPhoneNumOffice" >
							
							</div>
							
							<div class="form-group">
						
								<label for="empParmanentAddress">Employee Permanent Address: </label>
								<input type="text" class="form-control" placeholder="Employee Permanent Address ...." name="empParmanentAddress" id="empParmanentAddress" >
							
							</div>
							
							<div class="form-group">
						
								<label for="empPresentAddress">Employee Present Address: </label>
								<input type="text" class="form-control" placeholder="Employee Present Address ...." name="empPresentAddress" id="empPresentAddress" >
							
							</div>
						
							<button type="submit" name="btnSubmit" class="btn btn-success">Add Employee</button>
						
						</form>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
<?php

	}
	else
	{
		header("Location:../view/LeaveApplication.php");
	}
	}
	else
	{
		header("Location:../");
	}
?>