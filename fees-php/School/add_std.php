<?php
	include('../attach/header_sch.php');
?>
<div class="span-right">
	<div class="main-container">
		 <div class="post-header">
			<span> Add Student</span>
		 </div>
		 <div class="post-content">
			<div class="post-text">
				<form class="sch_ads" method="post" action="">
					<div class="box-left">
					     Enroll No.: <input  type="text" class="mando" name="sch_ads_enr">
					</div>
					<div class="box-right">
						 GR. No.: <input  type="text" class="mando" name="sch_ads_grn">
					</div>
					<div class="box-left">
						 Student Name: <input  type="text" class="mando" name="sch_ads_name">
					</div>
					<div class="box-right">
						 Father Name: <input  type="text" class="mando" name="sch_ads_fname">
					</div>
					<div class="box-left" >
						 Mother Name: <input type="text" class="mando" name="sch_ads_mname">
					</div>
					<div class="box-right">
						 Sex: <select name="sch_ads_sex" class="mando">
							 <option value="default">Select One</option>
							 <option value="male">Male</option>
							 <option value="female">Female</option>
						</select>
					</div>
					<div class="box-left">
						 Medium:<select name="sch_ads_mdm" class="mando">
							 <option value="default">Select One</option>
							 <option value="English">English</option>
							 <option value="French">French</option>
						</select>
					</div>
					<div class="box-right">
					     Standard::<select name="sch_ads_std" class="mando" onchange="div_count()">
							<option value="default">Select One</option>
							 <option value="first">First</option>
							 <option value="second">Second</option>
							 <option value="three">Three</option>
							 <option value="four">Four</option>
							 <option value="fifth">Fifth</option>
							 <option value="six">Six</option>
							 <option value="seven">Seven</option>
							 <option value="eight">Eight</option>
							 <option value="nine">Nine</option>
							 <option value="ten">Ten</option>
						</select>
					</div>
					<div class="box-left div-update-show">
						 Division:	 
					</div>
					<div class="box-right">
					     Date of Birth: <input  class="mando" type="date" name="sch_ads_dob">
					</div>
					<div class="box-left" >
						 Birth Place: <input  type="text" name="sch_ads_bplc">
					</div>
					<div class="box-right">
					     Contact No.: <input  type="text" class="mando inputpn" name="sch_ads_cont_num">
					</div>
					<div class="box-left">
						 Address: <input  type="text" class="mando" name="sch_ads_adrs">
					</div>
					<div class="box-right">
					     Documents: <input  type="text" name="sch_ads_docs">
					</div>
					<div class="box-left">
						 Religion: <input  type="text" name="sch_ads_relg">
					</div>
					<div class="box-right">
					     Caste: <input  type="text" name="sch_ads_cast">
					</div>
					<div class="box-left">
						 Sub-caste: <input  type="text" name="sch_ads_sub_cast">
					</div>
					<div class="box-right">
					     Nationality: <input  type="text" name="sch_ads_ntn">
					</div>
					<div class="box-left">
						 Last School: <input  type="text" name="sch_ads_lsch">
					</div>
					<div class="box-right">
					    Progress: <input  type="text" name="sch_ads_prog">
					</div>
					<div class="box-left">
						 Citizen Number: <input  type="text" name="sch_ads_adhar">
					</div>
					<div class="box-right">
					    Tax-Status:<select name="sch_ads_tax_status">
							<option value="default">Select One</option>
							 <option value="paying">Paying</option>
							 <option value="non-paying">Non-paying</option>
						</select>
					</div>
					<div class="box-left">
							<button class="sch_ads_sub"><span>Submit</span></button>
					</div>
				</form>
			</div>
		 </div>
	</div>
</div>
	<?php
	include('../attach/footer_sch.php');
?>