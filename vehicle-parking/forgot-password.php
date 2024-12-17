<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['reset'])){
    $secode=$_POST['secode'];
    $email=$_POST['email'];

    $query=mysqli_query($con,"SELECT ID from admin where  Email='$email' and Security_Code='$secode' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['secode']=$secode;
      $_SESSION['email']=$email;
     header('location:resetpw.php');
    } else {
      $msg="Invalid Details. Please try again.";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vehicle Parking System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading text-center"><b>Password Recovery</b></div>
				<div class="panel-body">
					<form method="POST">
					<?php if($msg)
						echo "<div class='alert bg-danger' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 
                        

						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Security Code" name="secode" type="text" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email ID" name="email" type="email" required>
							</div>
							
							<button class="btn btn-primary" type="submit" name="reset">Proceed</button>
                            <a href="index.php"><button class="btn btn-info" type="button">Back</button></a>
                            </fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
