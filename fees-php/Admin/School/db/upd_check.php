<?php
include('../../db.php');

if($_POST['count']=='1'){
	parse_str($_POST['adm_upd_show'], $set);
	$id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from user_sch	
		where Gr_num='".$set['adm_upd_show_grn']."'
		")
	);
	$det=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from sch_details	
		where Gr_num='".$set['adm_upd_show_grn']."'
		")
	);
	$string='<br/><br/><br/><br/><span class="adm_upd_grn_span" style="display:none">'.$set['adm_upd_show_grn'].'</span>';
}
else{
	$id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from user_sch	
		where Gr_num='".$_POST['adm_upd_show']."'
		")
	);
	$det=mysqli_fetch_assoc(mysqli_query($con,"SELECT * from sch_details	
		where Gr_num='".$_POST['adm_upd_show']."'
		")
	);
		$string='<br/><br/><br/><br/><span class="adm_upd_grn_span" style="display:none">'.$_POST['adm_upd_show'].'</span>';
}
//print_r($set['adm_upd_show_grn']);
$arr['id']=$id;
$arr['det']=$det;
if(!$id){
	?>
	<p>No Student for this GR/SR number.</p>
	<?php
	exit;
	}

$string=$string.'<form class="adm_upd_std_form">
<div class="box-left">
	 Name <input class="mando" value="'.$id['Name'].'" type="text" name="adm_upd_name">
</div>
<div class="box-right">
	Gr. No. <input  class="mando"  value="'.$id['Gr_num'].'" type="text" name="adm_upd_grn">
</div>
<div class="box-left">
	 Medium:<select name="adm_upd_mdm">
		 <option value="English">English</option>
		 <option value="French">French</option>
	</select>
</div>
<div class="box-right" >
	 Standard: <select name="adm_upd_std">
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
<div class="box-left">
	 Division: <input  class="mando"  value="'.$id['Section'].'" type="text" name="adm_upd_div">
</div>
<div class="box-right">
	 Enroll Number: <input  class="mando"  value="'.$det['Enroll'].'" type="text" name="adm_upd_enroll">
</div>
<div class="box-left">
	 Father Name: <input  class="mando"  value="'.$det['f_name'].'" type="text" name="adm_upd_fname">
</div>
<div class="box-right">
	 Mother Name: <input class="mando"   value="'.$det['m_name'].'" type="text" name="adm_upd_mname">
</div>
<div class="box-left">
	Sex: <select name="adm_upd_sex">
							 <option value="male">Male</option>
							 <option value="female">Female</option>
						</select>
</div>
<div class="box-right">
	 DOB: <input class="mando"   value="'.$det['DOB'].'" type="date" name="adm_upd_dob">
</div>
<div class="box-left">
	 Birth Place: <input  value="'.$det['birth_place'].'" type="text" name="adm_upd_bplace">
</div>
<div class="box-right">
	 Contact No.: <input class="mando inputpn"  value="'.$det['cont_num'].'" type="text" name="adm_upd_cont">
</div>
<div class="box-left">
	 Address: <input class="mando"  value="'.$det['address'].'" type="text" name="adm_upd_adrs">
</div>
<div class="box-right">
	 Documents: <input  value="'.$det['docs'].'" type="text" name="adm_upd_docs">
</div>
<div class="box-left">
	 Religion:<input  value="'.$det['religion'].'" type="text" name="adm_upd_rel">
</div>
<div class="box-right">
	 Caste: <input  value="'.$det['caste'].'" type="text" name="adm_upd_cast">
</div>
<div class="box-left">
	 Sub Caste:<input  value="'.$det['sub_caste'].'" type="text" name="adm_upd_scast">
</div>
<div class="box-right">
	 Nationality: <input  value="'.$det['nationality'].'" type="text" name="adm_upd_nati">
</div>
<div class="box-left">
	 Last School:<input  value="'.$det['last_school'].'" type="text" name="adm_upd_lsch">
</div>
<div class="box-right">
	 Progress: <input  value="'.$det['progress'].'" type="text" name="adm_upd_prog">
</div>
<div class="box-left">
	 Citizen Number:<input  value="'.$det['last_school'].'" type="text" name="adm_upd_adhr">
</div>
<div class="box-right">
	Tax-Status <select name="adm_upd_tsta">
							 <option value="paying">Paying</option>
							 <option value="non-paying">Non-Paying</option>
						</select>
</div>
<div class="box-right">
	<button class="adm_upd_sub"><span>Update</span></button>
</div>

</form>';
$arr['status']="Suceed";
$arr['data']=$string;
echo json_encode($arr);
exit;
?>