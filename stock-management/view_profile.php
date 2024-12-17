<?php
    require_once 'includes/header.php';
    LogInCheck();
    require_once 'includes/admin_nav.php';
    //var_dump($_SESSION);
?>
<?php
//connect db
require_once 'db.php';
$sql = "SELECT * FROM  `department` WHERE `dept_id`='" . $_SESSION['dept_id'] . "'";
//print_r($sql);
$query = $conn->query($sql);
$row = $query->fetch_assoc();
//var_dump($row);
$conn->close();
?>
<!--profile view code begin-->
<div class="container">
<div class="row">
<div class="col-md-offset-2">
<div class="panel panel-primary">
<div class="panel-body">
  <h3 class="text-center text-info"><?php echo $_SESSION['dept_name'] .' PROFILE'; ?></h3>
</div>
<div class="panel-footer">
    <div class="row">
    <div class="well well-lg text-center text-capitalize">
        <div class="well well-sm">
            <b>DEPARTMENT ID :</b><em><?php echo $row['dept_id'] ;?></em>&nbsp;&nbsp;&nbsp;<a href='#' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span></a>
        </div>
        <div class="well well-sm">
        <b>DEPARTMENT NAME :</b><em><?php echo $row['dept_name'] ;?></em>&nbsp;&nbsp;&nbsp;<a href='#' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span></a>
    </div>    
    <div class="well well-sm">
        <b>DETAIL :</b><em><?php echo $row['dept_details'] ;?></em>&nbsp;&nbsp;&nbsp;<a href='#' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span></a>
    </div>
    <div class="well well-sm">
        <b>ADDED AT :</b><em><?php echo $row['added_at'] ;?></em>&nbsp;&nbsp;&nbsp;<a href='#' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span></a>
    </div>
    </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!--end profile-->
<hr>
<?php require_once 'includes/footer.php'; ?>
