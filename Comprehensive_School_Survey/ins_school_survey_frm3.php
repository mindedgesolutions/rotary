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
//
$stud_girls=$_POST['txtNoOfGirls'];
$stud_boys=$_POST['txtNoOfBoys']; 
$stud_total=$_POST['txtTotalStudent'];
 
$teacher_male=$_POST['txtMale']; 
$teacher_femail=$_POST['txtFemale']; 
$teacher_total=$_POST['txtTotalTeacher']; 

$tran_teacher_male=$_POST['txtTrainedMaleTeacher']; 
$tran_teacher_femail=$_POST['txtTrainedFemaleTeacher']; 
$tran_teacher_total=$_POST['txtTotalTrainedTeacher']; 

$dis_male=$_POST['txtNoDisabilityMale']; 
$dis_female=$_POST['txtNoDisabilityFemale']; 
$dis_total=$_POST['txtTotalDisability']; 

$seeing=$_POST['txtSeeing']; 
$hearing=$_POST['txtHearing']; 
$speech=$_POST['txtSpeech']; 
$moving=$_POST['txtMoving']; 
$mental_retard=$_POST['txtMentalRetardation']; 
$dis_other=$_POST['txtDisabilityothers']; 

$slow_learners=$_POST['slowlearners']; 
$conduct_co_curricular=$_POST['curricularActivities']; 
$ex_school_mgm_comm=$_POST['schoolMgm']; 
$is_smc_active=$_POST['yesnoA1']; 
$school_dev_plan=$_POST['yesnoC1']; 
$time_fram_smc=$_POST['yesnoB1'];


//echo $suid;
// Insert data into mysql  survey_id='$surveyID' and 
$sql="Update tbl_school_survey set
stud_girls='$stud_girls', 
stud_boys='$stud_boys', 
stud_total='$stud_total',
teacher_male='$teacher_male',
teacher_femail='$teacher_femail', 
teacher_total='$teacher_total', 
tran_teacher_male='$tran_teacher_male', 
tran_teacher_femail='$tran_teacher_femail', 
tran_teacher_total='$tran_teacher_total', 
dis_male='$dis_male', 
dis_female='$dis_female', 
dis_total='$dis_total', 
seeing='$seeing', 
hearing='$hearing', 
speech='$speech', 
moving='$moving', 
mental_retard='$mental_retard', 
dis_other='$dis_other', 
slow_learners='$slow_learners', 
conduct_co_curricular='$conduct_co_curricular', 
ex_school_mgm_comm='$ex_school_mgm_comm', 
is_smc_active='$is_smc_active', 
school_dev_plan='$school_dev_plan', 
time_fram_smc='$time_fram_smc'
where survey_id='$surveyID' and userid='$userid'";

$result=mysql_query($sql);

if($result){	
	//echo $sql;
	echo '
		<script>
		alert("Data Successfully Saved");
		window.location.href="cssform4.php?suid='.$surveyID.'";
		</script>
		';
}
	

else {
echo "ERROR";
}

?> 
