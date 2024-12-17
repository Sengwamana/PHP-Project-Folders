<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    if (strlen($_SESSION['vpmsaid']==0)) {
        header('location:logout.php');
        } else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VPS</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
	
		<?php
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Search Vehicles</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Search Results - Based Upon Vehicle Registration Number</div>
						<div class="panel-body">

                        <?php
                        if(isset($_POST['searchdata']))
                        { 

                        $sdata=$_POST['searchdata'];
                        ?>
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                        
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Vehicle Reg. No.</th>
                                <th>Company</th>
                                <th>Category</th>
                                <th>Parking Number</th>
                                <th>Vehicle's Owner</th>
                                <th></th>

                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            $ret=mysqli_query($con,"SELECT * from vehicle_info where RegistrationNumber like '$sdata%'");
                            $num=mysqli_num_rows($ret);
                            if($num>0){
                            $cnt=1;
                            while ($row=mysqli_fetch_array($ret)) {

                            ?>
                    
                                <tr>

                                <td><?php echo $cnt;?></td>
                                    
                                <td><?php  echo $row['RegistrationNumber'];?></td>

                                <td><?php  echo $row['VehicleCompanyname'];?></td>

                                <td><?php  echo $row['VehicleCategory'];?></td>

                                <td><?php  echo 'CA-'.$row['ParkingNumber'];?></td>

                                <td><?php  echo $row['OwnerName'];?></td>
                                
                                <?php if(empty($row['Status'])){ ?>
                                    <td><a href="update-incomingdetail.php?updateid=<?php echo $row['ID'];?>"><button type="button" class="btn btn-sm btn-info">Take Action</button></a></td>
                                 <?php } else { echo '<td></td>'; }?>

                                    

                               

                                </tr>

                                    <?php $cnt=$cnt+1; } } else {?>

                                    <tr>
                                    <th colspan="12"><div class="alert bg-danger" role="alert"> <em class="fa fa-lg fa-warning">&nbsp;</em>
                                        No Results Found!
                                    </div></th>
                                    </tr>
                                    <?php } }?>
                            
                            </tbody>

                        </table>
						</div>
					</div>
				</div>
				
				
				
</div><!--/.row-->
		
		
		

        <?php include 'includes/footer.php'?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
};
	</script>

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
		
</body>
</html>

<?php }  ?>