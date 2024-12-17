<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');
error_reporting(0);

if(isset($_POST['resetpw']))
  {
    $secode=$_SESSION['secode'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"UPDATE admin set Password='$password'  where  Email='$email' && Security_Code='$secode' ");
   if($query){
	echo "<script>alert('Password Changed!');</script>";
	session_destroy();
	header('location:index.php');
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
	
	<script type="text/javascript">

	function checkpass(){
	if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value){
		alert('New Password and Confirm Password field does not match');
		document.changepassword.confirmpassword.focus();
		return false;
	}
		return true;
	} 

	</script>
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
								<input class="form-control" placeholder="New Password" name="newpassword" type="password" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Password" name="confirmpassword" type="password" required>
							</div>
							
							<button class="btn btn-primary" type="submit" name="resetpw">Submit</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
