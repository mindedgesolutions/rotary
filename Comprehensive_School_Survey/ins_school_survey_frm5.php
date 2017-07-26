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
$pe_period_upto5th=$_POST['row1'];
$pe_period_upto10th=$_POST['row2']; 
$pe_period_upto12th=$_POST['row3'];

$no_pe_teacher=$_POST['peTeacher'];
$no_pe_teacher_other=$_POST['txtpeOther'];

$edu_quali_pe_teacher_01=$_POST['edu_qua_peTeacher'];
$edu_quali_pe_teacher=implode(",",$_POST['edu_qua_peTeacher']);  

$edu_quali_pe_teacher_other=$_POST['txtPeTeacherOther']; 
$curriculum_pe_sports=$_POST['peSports']; 
$who_has_prescrib_it=$_POST['txtPeSports']; 

$sports_played_in_school=implode(",",$_POST['sportPlayed']); 
$sports_infra=implode(",",$_POST['sportInfra']); 
$sports_infra_other=$_POST['txtSportsInfraOther']; 
$spend_on_sports=$_POST['sportPhy']; 
$maj_chall_faced_ped=implode(",",$_POST['promotPED']);
$maj_chall_faced_ped_other=$_POST['txtSportsInfraOther']; 
$promote_phy_edu=$_POST['peSports']; 
$who_fund_sport_act=implode(",",$_POST['sportfund']); 
$who_fund_sport_act_other=$_POST['txtSportFundOther']; 
$any_other_info_not_covered=$_POST['otherInfo']; 


//echo $suid;
// Insert data into mysql  survey_id='$surveyID' and 
$sql="Update tbl_school_survey set
pe_period_upto5th='$pe_period_upto5th',
pe_period_upto10th='$pe_period_upto10th', 
pe_period_upto12th='$pe_period_upto12th',
no_pe_teacher='$no_pe_teacher', 
no_pe_teacher_other='$no_pe_teacher_other',
edu_quali_pe_teacher='$edu_quali_pe_teacher', 
edu_quali_pe_teacher_other='$edu_quali_pe_teacher_other', 
curriculum_pe_sports='$curriculum_pe_sports', 
who_has_prescrib_it='$who_has_prescrib_it', 
sports_played_in_school='$sports_played_in_school', 
sports_infra='$sports_infra', 
sports_infra_other='$sports_infra_other', 
spend_on_sports='$spend_on_sports', 
maj_chall_faced_ped='$maj_chall_faced_ped', 
maj_chall_faced_ped_other='$maj_chall_faced_ped_other', 
promote_phy_edu='$promote_phy_edu', 
who_fund_sport_act='$who_fund_sport_act', 
who_fund_sport_act_other='$who_fund_sport_act_other', 
any_other_info_not_covered='$any_other_info_not_covered' 
where survey_id='$surveyID' and userid='$userid'";

$result=mysql_query($sql);

if($result){	
	//echo $sql;
	echo '
		<script>
		alert("Data Successfully Saved");
		window.location.href="dashboard.php";
		</script>
		';
}
	

else {
echo "ERROR";
}

?> 
