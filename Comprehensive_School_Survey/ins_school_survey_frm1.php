<?php
session_start();
ob_start();
include('include/config.php');
   
$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['username'];
// Get values from form 
$userid=$_SESSION['uid'];
$identity=$_POST['areyoua'];
$district=$_POST['ddDistrict']; 
$club=$_POST['ddClub']; 
$rotractClub=$_POST['txtClub'];
$ph_no=$_POST['txtPhoneNo']; 
$name=$_POST['txtPersonName']; 
$Address=$_POST['txtAddress'];
$email=$_POST['txtEmailID']; 
$surv_id=$_POST['txtSurveyId'];
echo $surv_id;
if($surv_id=="o"){
		$sql="INSERT INTO tbl_school_survey(userid,identity,district,club,ph_no,name,Address,email,rotractClub)
VALUES('$userid','$identity','$district','$club','$ph_no','$name','$Address','$email','$rotractClub')";
//echo $sql;
$result=mysql_query($sql);

if($result){	
	$result1 = mysql_query("select max(survey_id) from tbl_school_survey");
    $row = mysql_fetch_row($result1);
    $highest_id = $row[0];	
	//echo $highest_id;
	if($result1){
	echo '
		<script>
		window.location.href="cssform2.php?suid='.$highest_id.'";
		</script>
		';
	}
}
}
else if($surv_id>0)
{
	$sql="Update tbl_school_survey set ph_no='$ph_no',name='$name',Address='$Address', 
	email='$email'
	where survey_id='$surv_id' and userid='$userid'";

	$result=mysql_query($sql);
	if($result){	
	//$result1 = mysql_query("select max(survey_id) from tbl_school_survey");
    //$row = mysql_fetch_row($result1);
    //$highest_id = $row[0];	
	//echo $highest_id;
	if($result){
	echo '
		<script>
		window.location.href="cssform2.php?suid='.$surv_id.'";
		</script>
		';
	}
	}
}
// Insert data into mysql 

	

//else {
//echo "ERROR";
//}
?> 
