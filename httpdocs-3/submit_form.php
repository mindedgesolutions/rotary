<?php
ob_start();
include('include/config.php'); 
error_reporting(0);

session_start();
include('volunteer_session_check.php');

if(isset($_POST['submit'])){
$person_id = $_POST['person_id'];	
$person_email_id = $_POST['person_email_id'];	
/////////////////////////////////////////////// Teacher Training ///////////////////////////////////////////////////////////////////	
$qualifications = $_POST['qualification'];
$qualifications = str_replace("_"," ",$qualifications);
$qualification = implode(",",$_POST['qualification']);

$trainings = $_POST['traning'];
$trainings = str_replace("_"," ",$trainings);
$training = implode(",",$_POST['traning']);

$weeks = $_POST['week'];
$weeks = str_replace("_"," ",$weeks);
$week = implode(",",$_POST['week']);

$experience = $_POST['experience'];
$exp_detail = $_POST['exp_detail'];
$hours = $_POST['hours'];
$city = $_POST['city'];
$state = $_POST['state'];
$district = $_POST['district'];

$type_teacher_train = $_POST['type_teacher_train'];
$id_teacher_train = $_POST['id_teacher_train'];
$teacher_train = $_POST['teacher_train'];
/////////////////////////////////////////////// Teacher Training  /////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////// Volunteer Teacher  /////////////////////////////////////////////////////////////////////
$extra_activity_conduct_1 = $_POST['extra_activity_conduct'];
//$extra_activity_conduct_1 = str_replace("_"," ",$extra_activity_conduct_1);
$extra_activity_conduct = implode(",",$_POST['extra_activity_conduct']);

$weeks1 = $_POST['week1'];
//$weeks1 = str_replace("_"," ",$weeks1);
$week1 = implode(",",$_POST['week1']);

$time1 = $_POST['time'];
//$time1 = str_replace("_"," ",$time1);
$time = implode(",",$_POST['time']);

$previous_experience_02 = $_POST['previous_experience_02'];
$city_01 = $_POST['city_01'];
$state01 = $_POST['state_01'];
$district_01 = $_POST['district_01'];

$type_volunteer_teacher = $_POST['type_volunteer_teacher'];
$id_volunteer_teacher = $_POST['id_volunteer_teacher'];
$volunteer_teacher = $_POST['volunteer_teacher'];
/////////////////////////////////////////////// Volunteer Teacher  /////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////// Child Screen  //////////////////////////////////////////////////////////////////////////
$week_screen01 = $_POST['week_screen'];
//$week_screen01 = str_replace("_"," ",$week_screen01);
$week_screen = implode(",",$_POST['week_screen']);
$district_02 = $_POST['district_02'];
$city_02 = $_POST['city_02'];
$state02 = $_POST['state_02'];

$type_child_screen = $_POST['type_child_screen'];
$id_child_screen = $_POST['id_child_screen'];
$child_screen = $_POST['child_screen'];
/////////////////////////////////////////////// Child Screen  //////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////// Supplment Teach  //////////////////////////////////////////////////////////////////////////
$subject_01 = $_POST['subject'];
//$subject_01 = str_replace("_"," ",$subject_01);
$subject = implode(",",$_POST['subject']);

$week_001 = $_POST['week_01'];
//$week_001 = str_replace("_"," ",$week_001);
$week_01 = implode(",",$_POST['week_01']);

$class009 = $_POST['class'];
$class = implode(",",$_POST['class']);

//$activity = $_POST['activity'];
$activity = implode(",",$_POST['activity']);
$co_activity01 = $_POST['co_activity01'];
//$co_activity01 = $_POST['activity01'];
$co_activity02 = $_POST['co_activity02'];

$co_activity03 = $_POST['co_activity03'];
$teach_co_activity = $_POST['subject'];
$co_activity04 = $_POST['co_activity04'];
$hours_02 = $_POST['hours_02'];
$city_05 = $_POST['city_05'];
$state_05 = $_POST['state_05'];
$district_03 = $_POST['district_03'];
$type_supplment_teach = $_POST['type_supplment_teach'];
$id_supplment_teach = $_POST['id_supplment_teach'];
$supplment_teach = $_POST['supplment_teach'];
/////////////////////////////////////////////// Supplment Teach  //////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////// Educative Session  //////////////////////////////////////////////////////////////////////////
$week_060 = $_POST['week_06'];
//$week_060 = str_replace("_"," ",$week_060);
$week_06 = implode(",",$_POST['week_06']);

$time_060 = $_POST['time_06'];
//$time_060 = str_replace("_"," ",$time_060);
$time_06 = implode(",",$_POST['time_06']);

$building_sessions_06 = $_POST['building_sessions_06'];
$methodology_session_06 = $_POST['methodology_session_06'];
$previous_experience_06 = $_POST['previous_experience_06'];
$weekly_hour = $_POST['weekly_hour'];
$city_06 = $_POST['city_06'];
$state_06 = $_POST['state_06'];
$district_04 = $_POST['district_04'];

$type_educative_session = $_POST['type_educative_session'];
$id_educative_session = $_POST['id_educative_session'];
$educative_session = $_POST['educative_session'];


/////////////////////////////////////////////// Educative Session //////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////// Curricular Activity  //////////////////////////////////////////////////////////////////////////
$week_070 = $_POST['week_07'];
//$week_070 = str_replace("_"," ",$week_070);
$week_07 = implode(",",$_POST['week_07']);

$time_extra_curricu_07 = $_POST['time_extra_curricu'];
//$time_extra_curricu_07 = str_replace("_"," ",$time_extra_curricu_07);
$time_extra_curricu = implode(",",$_POST['time_extra_curricu']);

$cocurricular_activities_teach = $_POST['cocurricular_activities_teach'];
$previous_experience_cocurricular = $_POST['previous_experience_cocurricular'];
$weekly_hour = $_POST['weekly_hour'];
$district_05 = $_POST['district_05'];
$city_08 = $_POST['city_08'];
$state_08 = $_POST['state_08'];

$type_curricular_activity = $_POST['type_curricular_activity'];
$id_curricular_activity = $_POST['id_curricular_activity'];
$curricular_activity = $_POST['curricular_activity'];

/////////////////////////////////////////////// Curricular Activity  //////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////// Communication Activity  //////////////////////////////////////////////////////////////////////////
$commu_quali = $_POST['commu_quali'];
$experience_commu = $_POST['experience_commu'];
$for_what = $_POST['for_what'];

$type_commu = $_POST['type_commu'];
$id_commu = $_POST['id_commu'];
$commu = $_POST['commu'];

/////////////////////////////////////////////// Communication Activity  //////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////// Fund Raising Activity  //////////////////////////////////////////////////////////////////////////
$fund_quali = $_POST['fund_quali'];
$experience_fund = $_POST['experience_fund'];
$amt_fund = $_POST['amt_fund'];
$year_fund = $_POST['year_fund'];
$where_raise_fund = $_POST['where_raise_fund'];

$type_fund_raise = $_POST['type_fund_raise'];
$id_fund_raise = $_POST['id_fund_raise'];
$fund_raise = $_POST['fund_raise'];

/////////////////////////////////////////////// Fund Raising Activity  //////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////// Asha Kiran Teacher Training /////////////////////////////////////////////////////////////////////

$teacher_name = $_POST['training_teacher_name'];
$teacher_address = $_POST['training_teacher_address'];
$teacher_city = $_POST['training_teacher_city'];
$teacher_state = $_POST['selectState'];
$teacher_other_state = $_POST['txt_other_state'];
$teacher_pin_code = $_POST['training_teacher_pin_code'];
$teacher_mob_no = $_POST['training_teacher_mob_no'];
$teacher_email = $_POST['training_teacher_email'];
$teacher_edu_qualification = $_POST['selectEduQualification'];
$teacher_training_qualification = implode(",",$_POST['teacher_training_qualification']);
$teacher_training_qualification_other = $_POST['txtOtherTeacherTraining'];
$teacher_experience = $_POST['teachTraningExp'];
$teach_hin_eng_bang_math = $_POST['train_mgm_cls'];
$teacher_training_work_exp = $_POST['txtTeachExp'];
$teach_experience_dtl = $_POST['training_exp_detail'];
$available_days = implode(",",$_POST['teacherTrainingweek']);
$available_total_hours = $_POST['teachr_training_hours'];
$master_pk = $_POST['id_master_pk'];
$teacher_traning_at_asha_kiran = $_POST['teacher_traning_at_asha_kiran'];

/////////////////////////////////////////////// Asha Kiran Teacher Training  /////////////////////////////////////////////////////////////////////

if($teacher_traning_at_asha_kiran == 'teacher_traning_at_asha_kiran'){
 $sql16 = "Insert into asha_kiran_teacher_train values (NULL,'$teacher_name','$teacher_address','$teacher_city','$teacher_state','$teacher_other_state','$teacher_pin_code','$teacher_mob_no','$teacher_email','$teacher_edu_qualification','$teacher_training_qualification','$teacher_training_qualification_other','$teacher_experience','$teach_hin_eng_bang_math','$teacher_training_work_exp','$teach_experience_dtl','$available_days','$available_total_hours','$master_pk','$teacher_traning_at_asha_kiran')";
//echo $sql1;
$result16 = mysql_query($sql16);
}

if($teacher_train == 'teacher_train'){
 $sql1 = "Insert into teacher_train values (NULL,'$qualification','$training','$week','$experience','$exp_detail','$hours','$city','$state','$district','$type_teacher_train','$id_teacher_train','$teacher_train')";
//echo $sql1;
$result1 = mysql_query($sql1);
}

if($volunteer_teacher == 'volunteer_teacher'){
	$sql2 = "Insert into volunteer_teacher values (NULL,'$extra_activity_conduct','$week1','$time','$previous_experience_02','$city_01','$state01','$district_01','$type_volunteer_teacher','$id_volunteer_teacher','$volunteer_teacher')";
//echo $sql2;
$result2 = mysql_query($sql2);
}

if($child_screen == 'child_screen'){
	$sql3 = "Insert into child_screen values (NULL,'$week_screen','$district_02','$city_02','$state02','$type_child_screen','$id_child_screen','$child_screen')";
//echo $sql3;
$result3 = mysql_query($sql3);
}

if($supplment_teach == 'supplment_teach'){
	$sql4 = "Insert into supplment_teach values (NULL,NULL,'$week_01','$class','$district_03','$activity','$co_activity01','$co_activity02','$co_activity03','$teach_co_activity','$co_activity04','$hours_02',
'$city_05','$state_05','$type_supplment_teach','$id_supplment_teach','$supplment_teach')";

//$sql4 = "Insert into supplment_teach values (NULL,'$subject','$week_01','$class','$district_03''$activity','$co_activity01','$co_activity02','$co_activity03','$teach_co_activity','$co_activity04','$hours_02',
//'$city_05','$state_05','$type_supplment_teach','$id_supplment_teach','$supplment_teach')";

//echo $sql4;
$result4 = mysql_query($sql4);
}

if($educative_session == 'educative_session'){
	$sql5 = "Insert into educative_session values (NULL,'$week_06','$time_06','$district_04','$building_sessions_06','$methodology_session_06','$previous_experience_06','$weekly_hour','$city_06','$state_06','$type_educative_session','$id_educative_session','$educative_session')";
//echo $sql5;
$result5 = mysql_query($sql5);
}

if($curricular_activity == 'curricular_activity'){
	$sql6 = "Insert into curricular_activity values (NULL,'$cocurricular_activities_teach','$previous_experience_cocurricular','$weekly_hour','$city_08','$state_08','$district_05','$time_extra_curricu','$week_07',
'$type_curricular_activity','$id_curricular_activity','$curricular_activity')";
//echo $sql6;
$result6 = mysql_query($sql6);
 }

if($commu == 'commu'){
 $sql12 = "Insert into commu values (NULL,'$commu_quali','$experience_commu','$for_what','$type_commu','$id_commu','$commu')";
//echo $sql1;
$result1 = mysql_query($sql12);
}
 
if($fund_raise == 'fund_raise'){
 $sql13 = "Insert into fund_raise values (NULL,'$fund_quali','$experience_fund','$amt_fund','$year_fund','$where_raise_fund','$type_fund_raise','$id_fund_raise','$fund_raise')";
//echo $sql1;
$result1 = mysql_query($sql13);
}












 
  
 if($person_email_id != ''){
 $to = $person_email_id;
  //echo '<br>'.$to;
  $subject = "RILM Volunteer";
  $message = '<table cellspacing="2" cellpadding="2" style="width:auto;border:1px solid #ccc;">
			<tr>
			<td width="388">Thank you for applying for RILM`s Volunteer Program! We will screen your application and revert to you shortly.. </td>
			</tr>
		</table>';
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  // More headers
  $headers .= 'From: Rotary India Literacy Mission <volunteer@rotarytech.org>'. "\r\n";
  //send email
  $send_contact = mail($to,$subject,$message,$headers);
  
  //Email response
  //echo "Thank you for contacting us!";
  }	

session_unset();
  
echo '<script>
var txt;
var r = confirm("Thank you for applying for RILM`s Volunteer Program! We will screen your application and revert to you shortly");
if (r == true) {
    txt = window.location.href="http://www.rotaryteach.org/";
} else {
    txt = window.location.href="../volunteer_registration.php";
}
</script>';
}
//if (isset($_POST['person_email_id']))  {
  
  //Email information
  //txt = window.location.href="../vertical_section.php?ver='.$person_id.'";
?>