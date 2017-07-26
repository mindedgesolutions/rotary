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


//echo $suid;
// Insert data into mysql  survey_id='$surveyID' and 
$sql="Update tbl_school_survey set
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
e_learning_func_unit='$e_learning_func_unit'
where survey_id='$surveyID' and userid='$userid'";

$result=mysql_query($sql);

if($result){	
	//echo $sql;
	echo '
		<script>
		alert("Data Successfully Saved");
		window.location.href="cssform5.php?suid='.$surveyID.'";
		</script>
		';
}
	

else {
echo "ERROR";
}

?> 
