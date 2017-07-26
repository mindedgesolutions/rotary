<?php
session_start();
ob_start();
//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
include('include/config.php');

$db_name="rotary32_teach2"; // Database name 
$tbl_name="tbl_child_profile_card_temp"; // Table name

// Get values from form 

//$centreid= $_SESSION['uid'];
//$child_photo=$_FILES['child_image'];
$child_name=$_POST['child_name'];
$child_gender=$_POST['gender'];
$child_dob=$_POST['child_age'];
$child_father_name=$_POST['father_name'];
$child_mother_name=$_POST['mother_name'];
$child_guardian_name=$_POST['child_gaurdian'];
$previously_study=$_POST['studied'];
$street=$_POST['address_1'].', '.$_POST['address_2'];
$city=$_POST['city'];
$block=$_POST['block'];
$state=$_POST['ddState'];
$category=$_POST['category'];
$Differently_Abled=$_POST['DifferentlyAbled'];
$Learning_Disabilities=$_POST['LearningDisabilities'];
//$create_by=$_SESSION['uid'];
$create_by=$_SESSION['username'];
$create_date=date('d/m/Y');
$status="1";
$approval="Approved";
$type="NGO";
$tagged="no";
$ngoid=$_SESSION['uid'];
$name_partner_ngo=$_POST['txtngo'];
//$_POST['NGOname'];
$centerid=$_POST['ddCenter'];
$status_b="t";
$basic_calculation=$_POST['basic_calculation'];
$reason_no_school=$_POST['reason_no_school'];
$occupation=$_POST['occupation'];

$child_photo = $_FILES['child_image'];
$image_name= time().basename($_FILES['child_image']['name']);
move_uploaded_file($child_photo['tmp_name'], "../child_development/upload/". $image_name);
//centreid,child_photo,child_name,child_gender,child_dob,child_father_name,child_mother_name,child_guardian_name,previously_study,
//street,city,block,state,category,Differently_Abled,Learning_Disabilities,create_by,create_date,status,approval,type,
//tagged,ngoid,centerid


// Insert data into mysql  
$sql="INSERT INTO $tbl_name(child_photo,child_name,child_gender,child_dob,child_father_name,child_mother_name,child_guardian_name,previously_study,
street,city,block,state,name_partner_ngo,category,Differently_Abled,Learning_Disabilities,create_by,create_date,status,approval,type,tagged,ngoid,centerid,status_b,basic_calculation,reason_no_school,occupation)
VALUES('$image_name','$child_name','$child_gender','$child_dob','$child_father_name','$child_mother_name','$child_guardian_name','$previously_study',
'$street','$city','$block','$state','$name_partner_ngo','$category','$Differently_Abled','$Learning_Disabilities','$create_by','$create_date','$status','$approval','$type',
'$tagged','$ngoid','$centerid','$status_b','$basic_calculation','$reason_no_school','$occupation')";


$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
  
if($result){
	echo '
	<script>
	alert("Data Successfully Saved");
	window.location.href="add_new_child.php";
	</script>
	';
	//header ("Location: add_new_child.php");	
}
else {
echo "ERROR";
}
?> 


