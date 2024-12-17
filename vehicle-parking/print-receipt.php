<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
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

		<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="row">
			
		</div><!--/.row-->
		<a href="out-vehicles.php"><button class="btn btn-primary">Back</button></a>
		<?php
        $cid=$_GET['vid'];
        $ret=mysqli_query($con,"SELECT * from vehicle_info where ID='$cid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
        ?>
                
                <div  id="exampl">
      <table id="dom-jqry" class="table table-striped table-bordered">
        <tr>
          <th colspan="4" style="text-align: center; font-size:22px;"> Vehicle Parking System Receipt</th>
        </tr>

        <tr>

        <th>Registration Number</th>
              <td><?php  echo $row['RegistrationNumber'];?></td>
                       

          <th>Vehicle Category</th>
              <td><?php  echo $row['VehicleCategory'];?></td>
              </tr>

              <tr>
          <th>Vehicle Company</th>
              <td><?php  echo $packprice= $row['VehicleCompanyname'];?></td>
        
          <th>Parking Number</th>
              <td><?php  echo 'CA-'.$row['ParkingNumber'];?></td>
              </tr>

              <tr>
              <th>Owner Name</th>
                <td><?php  echo $row['OwnerName'];?></td>
            
                  <th>Owner Contact Number</th>
                  <td><?php  echo $row['OwnerContactNumber'];?></td>
              </tr>

              <tr>
          <th>Vehicle In-Time</th>
          <td><?php  echo $row['InTime'];?></td>

          <th>Current Status</th>
          <td> 
            <?php  
            if($row['Status']==""){
              echo "Incoming Vehicle";
            }
            if($row['Status']=="Out"){
              echo "Outgoing Vehicle";
            } ;
            ?>
          </td>
      </tr>
      <?php if($row['Remark']!=""){ ?>
      <tr>
        <th>Vehicle Out-Time</th>
        <td><?php  echo $row['OutTime'];?></td>

        <th>Total Charge</th>
        <td><?php  echo "$ ", $row['ParkingCharge'];?></td>
      </tr>

      <tr>
        <th>Remarks</th>
        <td colspan="3"><?php  echo  $row['Remark'];?></td> 
      </tr>

      <?php } ?>
        <tr>
          <td colspan="4" style="text-align:center; cursor:pointer"><i class="fa fa-print fa-4x" aria-hidden="true" OnClick="CallPrint(this.value)"  ></i></td>
        </tr>
    </table>
    
    <?php }  ?>
  </div>

  <script>
  function CallPrint(strid) {
    var prtContent = document.getElementById("exampl");
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
  }
</script> 
		

        
	</div>	<!--/.main-->
	<div class="col-lg-2"></div>
	
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

