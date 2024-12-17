<?php 
include('../../db.php');
$c=$_POST['c'];
//print_r($p);
$header=mysqli_fetch_row(mysqli_query($con,"select Name,logo from info where key_p='007'"));
?>
<div class="main-container">
	<div class="post-header">
		<span><img src='../admin/school/<?php echo $header[1] ?>'/></span>
		<span style="display:block;float:right;">
			<?php echo $header[0] ?>
		</span>
	</div>
	<div class="post-content">
		<div class="post-text">
			<div class="box-left">
				Reciept Number:
				<span class="form-text">
					<b><?php echo $c['rec'];?></b>
				</span>
			</div>
			<div class="box-right">
				Gr Number:
				<span class="form-text">
					<b><?php echo $c['Gr'];?></b>
				</span>
			</div>
			<div class="box-left">
				Name:
				<span class="form-text">
					<b><?php echo $c['det'][0];?></b>
				</span>
			</div>
			<div class="box-right">
				Medium:
				<span class="form-text">
					<b><?php echo $c['det'][1];?></b>
				</span>
			</div>
			<div class="box-left">
				Standard:
				<span class="form-text">
					<b><?php echo $c['det'][2];?></b>
				</span>
			</div>
			<div class="box-right">
				Session:
				<span class="form-text">
					<b><?php echo date('Y');?></b>
				</span>
			</div>
			<div class="box-left">
				Fee type:
				<span class="form-text">
					<b><?php print_r($c['typ']);?></b>
				</span>
			</div>
			<div class="box-right">
				Payment Mode:
				<span class="form-text">
					<b><?php echo $c['pay_mode'];?></b>
				</span>
			</div>
			<div class="box-left">
				Cheque Number
				<span class="form-text">
					<b><?php echo $c['chq'];?></b>
				</span>
			</div>
			<ul class="table-view">
				<li class="table-view-header" style="width:120px;">
					Month
				</li>
				<li class="table-view-header" style="width:120px;">
					Amount
				</li>
				<li class="table-view-header" style="width:120px;">
					Late Fee
				</li>
				<li class="table-view-header" style="width:120px;">
					Date
				</li>
			</ul>
		
			<?php 
				$late_fee=0;
				$fee=0;
				//print_r($c['lfee']);
				if($c['month']!='One time'){
					$count=0 ;
					foreach($c['month'] as $mon){
						?>
						<ul class="table-view">
							<li style="width:120px;" >
								<?php echo $mon ;?>
							</li>
							<li style="width:120px;" >
								<?php 
								echo $c['amount'];
								$fee=$fee+$c['amount'];
								?>
							</li>
							<li style="width:120px;">
								<?php ;
									//echo $count;
									$late_fee+=$c['lfee'][$count];
									echo $c['lfee'][$count++];
									
								?>
							</li>
							<li style="width:120px;">
								<?php echo date('d-m-Y');?>
							</li>
						</ul>
						<?php
					}
				}
				else{
				?>
					<ul class="table-view">
							<li style="width:120px;" >
								<?php echo $c['month'] ;?>
							</li>
							<li style="width:120px;" >
								<?php 
								echo $c['amount'];
								$fee=$c['amount']+$fee;
								?>
							</li>
							<li style="width:120px;">
								<?php 
								 if($c['ot']=='no'){
										echo $c['lfee'];
										$late_fee=$c['lfee']+$late_fee;
									}
									else{
										echo ('0');	
									}
								?>
							</li>
							<li style="width:120px;">
								<?php echo date('d-m-Y');?>
							</li>
						</ul>
				<?php }
			?>
			<ul class="table-view">
							<li style="width:120px;" >
								
							</li>
							<li style="width:120px;" class="table-view-header" >
								<?php echo "Amount: ".$fee;?>
							</li>
							<li style="width:120px;" class="table-view-header">
								<?php echo "Late fee:".$late_fee;?>
							</li>
							<li style="width:120px;" class="table-view-header">
								<?php echo ("Total Amount: "); echo($late_fee+$fee);?>
							</li>
						</ul>
		</div>
	</div>
	<button class="no-print print_add_fee"><span>Print</span></button>