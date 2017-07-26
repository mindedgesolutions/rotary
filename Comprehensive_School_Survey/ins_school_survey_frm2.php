<?php
session_start();
ob_start();
include('include/config.php');
   
$_SESSION['uid'];
$_SESSION['type'];
$_SESSION['username'];
// Get values from form  $_GET['stype'];

$userid=$_SESSION['uid'];
$surveyID=$_POST["txtmaxid"];
$school_name=$_POST['txtSchoolName']; 
$udise_no=$_POST['txtudiseno'];  
$head_teacher_name=$_POST['txtSchoolHead'];  
$school_ph_no=$_POST['txtSchoolPhoneNo'];  
$school_email=$_POST['txtSchoolEmailID'];  
$school_address=$_POST['txtSchoolAddress'];  
$school_state=$_POST['txtSchoolState'];  
$school_pin_code=$_POST['txtSchoolPin'];  
$school_website=$_POST['txtSchoolWebsite'];  
$school_type=$_POST['schooltype'];  
$school_cat=$_POST['schoolcat'];
$instruction_medium=$_POST['mySelect']; 

//echo $suid;

// Insert data into mysql  survey_id='$surveyID' and 
$sql="Update tbl_school_survey set school_name='$school_name',udise_no='$udise_no',head_teacher_name='$head_teacher_name', 
school_ph_no='$school_ph_no',school_email='$school_email',school_address='$school_address',school_state='$school_state',
school_pin_code='$school_pin_code',school_website='$school_website',school_type='$school_type',instruction_medium='$instruction_medium',
school_cat='$school_cat'
where survey_id='$surveyID' and userid='$userid'";

$result=mysql_query($sql);

if($result){	
	//echo $sql;
	echo '
		<script>
		alert("Data Successfully Saved");
		window.location.href="cssform3.php?suid='.$surveyID.'";
		</script>
		';
}
	

else {
echo "ERROR";
}

?> 
