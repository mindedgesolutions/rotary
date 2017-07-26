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

//2
//new field added
$schoolOption = $_POST['schoolOption'];
//new field added
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
//3
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

//4
$school_build_stru=$_POST['schoolBuildStr'];
$status_ele_supply=$_POST['statusEleSup'];
$kept_locked=$_POST['buildSecure'];

$toilet_for_boys=$_POST['toiletforboys'];
$toilet_for_boys_func=$_POST['txtBoysFunctional'];
$toilet_for_boys_non_func=$_POST['txtBoysNonFunctional'];
$toilet_for_boys_total=$_POST['txtTotalBoys'];

$toilet_for_girls=$_POST['toiletforgirls'];
$toilet_for_girls_func=$_POST['txtGirlsFunctional'];
$toilet_for_girls_non_func=$_POST['txtGirlsNonFunctional'];
$toilet_for_girls_total=$_POST['txtTotalGirls'];

$toilet_for_teachers=$_POST['toiletforteacher'];
$toilet_for_teachers_func=$_POST['txtTeacherFunctional'];
$toilet_for_teachers_non_func=$_POST['txtTeacherNonFunctional'];
$toilet_for_teachers_total=$_POST['txtTotalTeachers'];

$drink_water_stu_techer=$_POST['drinkWater'];
$hand_washing_stn=$_POST['washStation'];
$total_hand_wash_stn=$_POST['txtTotalHandWash'];

$library_with_book=$_POST['libBooks'];
$library_with_book_no=$_POST['txtTotalLibBooks'];

$footwear_per=$_POST['txtFootwear'];
$school_bag_per=$_POST['txtSchoolBag'];
$uniform_per=$_POST['txtUniform'];

$no_benches=$_POST['txtTotalBenches'];
$no_desks=$_POST['txtTotalDesks'];
$head_teacher=$_POST['headTeacher'];
$stores_separate=$_POST['stores'];
$laboratory=$_POST['laboratory'];
$kitchen_mid_day=$_POST['kitchen'];
$indoor_games=$_POST['IndoorGames'];
$staff_room=$_POST['StaffRoom']; 
$staff_room_no_chair=$_POST['txtTotalStaffRoomChairs'];
$staff_room_no_table=$_POST['txtTotalStaffRoomTables'];
$e_learning_fac=$_POST['eLearning'];
$e_learning_func_unit=$_POST['txteLearning'];
//5
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
//new field added
$trainedTeacher = $_POST['peTrainedTeacher'];
$sportsRepCard = $_POST['sportsRepCard'];
$interschool = $_POST['peInterschool'];
$districtlevel = $_POST['peDistrictlevel'];
$stateLevel = $_POST['peStateLevel'];
$nationallevel = $_POST['peNationallevel'];
$internationallevel = $_POST['peInternationallevel'];

$popularSport1 = $_POST['txtPopularSport1'];
$popularSport2 = $_POST['txtPopularSport2'];
$popularSport3 = $_POST['txtPopularSport3'];

$sportsPartOfCurriculum = $_POST['sportsPartOfCurriculum'];
$sportsPartOfCurriculumWhy = $_POST['txtsportsPartOfCurriculum'];
//new field added


if($userid!=""){
		$sql="INSERT INTO tbl_school_survey(userid,identity,district,club,ph_no,name,Address,email,rotractClub)
VALUES('$userid','$identity','$district','$club','$ph_no','$name','$Address','$email','$rotractClub')";
//echo $sql;
$result=mysql_query($sql);

if($result){	
	$result1 = mysql_query("select max(survey_id) from tbl_school_survey");
    $row = mysql_fetch_row($result1);
    $surveyID = $row[0];	
	//echo $highest_id;
	if($result1){
		$sql="Update tbl_school_survey set school_name='$school_name',udise_no='$udise_no',head_teacher_name='$head_teacher_name', 
		school_ph_no='$school_ph_no',school_email='$school_email',school_address='$school_address',school_state='$school_state',
		school_pin_code='$school_pin_code',school_website='$school_website',school_type='$school_type',instruction_medium='$instruction_medium',
		school_cat='$school_cat',
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
time_fram_smc='$time_fram_smc',
school_build_stru='$school_build_stru',
status_ele_supply='$status_ele_supply',
kept_locked='$kept_locked',
toilet_for_boys='$toilet_for_boys',
toilet_for_boys_func='$toilet_for_boys_func',
toilet_for_boys_non_func='$toilet_for_boys_non_func',
toilet_for_boys_total='$toilet_for_boys_total',
toilet_for_girls='$toilet_for_girls',
toilet_for_girls_func='$toilet_for_girls_func',
toilet_for_girls_non_func='$toilet_for_girls_non_func',
toilet_for_girls_total='$toilet_for_girls_total',
toilet_for_teachers='$toilet_for_teachers',
toilet_for_teachers_func='$toilet_for_teachers_func',
toilet_for_teachers_non_func='$toilet_for_teachers_non_func',
toilet_for_teachers_total='$toilet_for_teachers_total',
drink_water_stu_techer='$drink_water_stu_techer',
hand_washing_stn='$hand_washing_stn',
total_hand_wash_stn='$total_hand_wash_stn',
library_with_book='$library_with_book',
library_with_book_no='$library_with_book_no',
footwear_per='$footwear_per',
school_bag_per='$school_bag_per',
uniform_per='$uniform_per',
no_benches='$no_benches',
no_desks='$no_desks',
head_teacher='$head_teacher',
stores_separate='$stores_separate',
laboratory='$laboratory',
kitchen_mid_day='$kitchen_mid_day',
indoor_games='$indoor_games',
staff_room='$staff_room',
staff_room_no_chair='$staff_room_no_chair',
staff_room_no_table='$staff_room_no_table',
e_learning_fac='$e_learning_fac',
e_learning_func_unit='$e_learning_func_unit',
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
any_other_info_not_covered='$any_other_info_not_covered',
schoolOption='$schoolOption',
trainedTeacher='$trainedTeacher',
sportsRepCard='$sportsRepCard',
interschool='$interschool',
districtlevel='$districtlevel',
stateLevel='$stateLevel',
nationallevel='$nationallevel',
internationallevel='$internationallevel',
popularSport1='$popularSport1',
popularSport2='$popularSport2',
popularSport3='$popularSport3',
sportsPartOfCurriculum='$sportsPartOfCurriculum',
sportsPartOfCurriculumWhy='$sportsPartOfCurriculumWhy'
where survey_id='$surveyID' and userid='$userid'";

$result=mysql_query($sql);
if($result){	
	//echo $sql;
	echo '
		<script>
		alert("Once you click on submit you will not be able to edit this form again");
		window.location.href="dashboard.php";
		</script>
		';
}
	}
}
}
else {
echo "ERROR";
}
?> 
