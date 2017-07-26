<?php
session_start();
ob_start();
include('include/config.php');
//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");
//$link = mysqli_connect("192.185.36.129", "rotary32_arindam", "rotary32_teach", "info123");

$db_name="rotary32_teach2"; // Database name 
$tbl_name="tbl_child_profile_card_temp"; // Table name

// Get values from form 

//$centreid= $_SESSION['uid'];
//$child_photo=$_FILES['child_image'];
$id=$_POST['child_id'];
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
$Learning_Disabilities=$_REQUEST['LearningDisabilities'];
//$create_by=$_SESSION['uid'];
$create_by=$_SESSION['username'];
$create_date=date('d/m/Y');
$status="1";
$approval="Approved";
$type="NGO";
$tagged="no";
$ngoid=$_POST['NGOname'];
$centerid=$_POST['ddCenter'];
$ngoid=$_SESSION['uid'];
$basic_calculation=$_POST['basic_calculation'];
$reason_no_school=$_POST['reason_no_school'];
$occupation=$_POST['occupation'];

//present image
$new_child_image = $_FILES['new_child_image'];
$image_name= basename($_FILES['new_child_image']['name']);
$image_name1= time().basename($_FILES['new_child_image']['name']);
move_uploaded_file($new_child_image['tmp_name'], "../child_development/upload/". $image_name1);

//previous image checking
$sql1 = "Select * from tbl_child_profile_card_temp where child_id = '$id'";
$result1 = mysql_query($sql1);
while($data = mysql_fetch_array($result1)){
$pd_img_02 = $data['child_photo'];
}

//Update command

//if($child_photo!="")


$sql="UPDATE $tbl_name SET child_photo=IF('$image_name'='','$pd_img_02','$image_name1'),child_name='$child_name',child_gender='$child_gender',child_dob='$child_dob',
child_father_name='$child_father_name',child_mother_name='$child_mother_name',child_guardian_name='$child_guardian_name',previously_study='$previously_study',
street='$street',city='$city',block='$block',state='$state',category='$category',Differently_Abled='$Differently_Abled',
Learning_Disabilities='$Learning_Disabilities',create_by='$create_by',create_date='$create_date',status='$status',approval='$approval',
type='$type',tagged='$tagged',ngoid='$ngoid',centerid='$centerid',ngoid='$ngoid',basic_calculation='$basic_calculation',reason_no_school='$reason_no_school',occupation='$occupation'
WHERE child_id='" .$id. "'";

//echo $sql;

$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
  
if($result){
	
	echo '
	<script>
	alert("Data Successfully Updated");
	window.location.href="edit_new_child_list.php";
	</script>
	';
	//header ("Location: add_child_profile.php");	
}
else {
echo "ERROR";
}
?> 


