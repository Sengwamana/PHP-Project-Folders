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
				self.location='ListEmployee.php?cat=' + val ;
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
                    <a href="AddEmployee.php"><i class="fas fa-plus"></i> Add Employee</a>
                </li>
				<li>
                    <a style="color:#DAA520;" href="ListEmployee.php"><i class="fas fa-stream"></i> List Employee</a>
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
                        <h1 align="center">List of Employee</h1>
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
							$dptResult = $objEmployee->getAllDptInfo();
							///////////// End of query for first list box////////////

							/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
							if(isset($cat) and strlen($cat) > 0)
							{
								$objEmployee = new Employee();
								$singleResult = $objEmployee->getSingleEmpDptInfo($cat);
							}
							else
							{
								$objEmployee = new Employee();
								$singleResult = $objEmployee->getAllEmp();
							}
						//////////////////  This will end the second drop down list ///////////
						
						?>
						
						<form role="form" action="../controller/AddEmployeeController.php" method="post" >
							
							<div class="col-lg-6 col-md-offset-6 form-group">
						
								<div class="input-group">
									<div class="input-group-addon">Search</div>
									<?php
									echo "<select class='form-control' name='cat' id='empDptName' onchange=\"reload(this.form)\"><option value=''>Select All</option>";	
									
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
								
							</div>
							
							<div class="form-group">
								
								<?php
								echo "<table class='table table-bordered table-hover table-striped' name='subcat'><thead><tr class='success'><th>Emp. Code</th><th>Name</th><th>Department</th><th>Designation</th><th>Action</th></tr></thead><tbody>";
								
										while ($empResult = mysqli_fetch_array($singleResult))
										{ 
											?>
												<tr>
													<td><a href="../view/UsersLeaveDetails.php?cat=<?php echo $empResult['eEmployeeCodeNumber']?>"><?php echo $empResult['eEmployeeCodeNumber'] ?></a></td>
													<td><?php echo $empResult['eFirstName']." ".$empResult['eLastName'] ?></td>
													<td><?php echo $empResult['dptName'] ?></td>
													<td><?php echo $empResult['desiDesignationName'] ?></td>
													<?php 
														if($empResult['eEmployeeVerification']==1)
														{
															?>
															<td><button type="submit" value="<?php echo $empResult['eId'] ?>" name="btnVerify" class="btn btn-success">In-Active</button><?php if($empResult['eEmpType'] == 3) { ?> <button type="submit" value="<?php echo $empResult['eId'] ?>" name="btnCoordinator" class="btn btn-info">Normal User</button><?php } elseif($empResult['eEmpType'] == 2) { ?> <button type="submit" value="<?php echo $empResult['eId'] ?>" name="btnCoordinator" class="btn btn-primary">Coordinator</button><?php } else { ?> <button type="submit" value="<?php echo $empResult['eId'] ?>" name="btnCoordinator" class="btn btn-danger disabled">Admin</button><?php } ?></td>
															<?php
														}
														else
														{
															?>
															<td><button type="submit" value="<?php echo $empResult['eId'] ?>" name="btnVerify" class="btn btn-warning">Active</button></td>
															<?php
														}
													?>
												</tr>
											<?php
										}
									echo "</tbody></table>";
								?>
								
							</div>
							
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
