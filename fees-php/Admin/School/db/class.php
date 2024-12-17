<?php
include('../../db.php');
parse_str($_POST['adm_cls'], $class);
$check=mysqli_query($con,"select * from sch_class where Medium='".mysql_real_escape_string($class['adm_cls_mdm'])."' AND Std='".mysql_real_escape_string($class['adm_cls_std'])."'");
if(mysqli_num_rows($check)==0){
	mysqli_query($con,"Insert into sch_class 
				values(
				'".mysql_real_escape_string($class['adm_cls_mdm'])."',
				'".mysql_real_escape_string($class['adm_cls_std'])."',
				'".mysql_real_escape_string($class['adm_cls_div'])."',
				'".date("Y-m-d")."'
				)
			");		

	$query=mysqli_query($con,"select * from sch_class
							where sch_class.Medium='".mysql_real_escape_string($class['adm_cls_mdm'])."' 
							AND sch_class.Std='".mysql_real_escape_string($class['adm_cls_std'])."'
	");
	
	while($result=mysqli_fetch_row($query)){
				?>
				<ul class="table-view">
				
					<li style="width:100px" >
						<?php echo $result[0]; ?>
					</li>
					<li  style="width:100px;">
						<?php echo $result[1]; ?>
					</li>
					<li  style="width:100px;">
						<?php echo $result[2]; ?>
					</li>
					<li style="width:100px;">
						<?php
							$count=mysqli_num_rows(mysqli_query($con,"select * from user_sch where Medium='".$result[0]."' AND std='".$result[1]."'"));
							echo $count;
						?>
					</li>
					
				</ul>
				<?php
					}

	exit;
}
else{
	exit;
}
?> 