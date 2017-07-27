<?php
include('../include/config.php');

$update = "update project_temp_adult_literacy set no_centers='".$_REQUEST['centerNo']."', center_id='".$_REQUEST['centerId']."', center_name='".urlencode($_REQUEST['centerName'])."', state='".$_REQUEST['centerState']."', city='".$_REQUEST['centerCity']."', no_adult_learner='".$_REQUEST['no_adult_learner']."', teaching_language='".$_REQUEST['teachingLanguage']."', primer_type='".$_REQUEST['primerUsed']."', class_time='".$_REQUEST['classTime']."', start_date='".$_REQUEST['startDate']."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";
mysql_query($update);

$check = mysql_num_rows(mysql_query("select * from project_adult_literacy where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'"));

if ($check > 0){

	$update_original = "update project_adult_literacy set no_centers='".$_REQUEST['centerNo']."', center_id='".$_REQUEST['centerId']."', center_name='".urlencode($_REQUEST['centerName'])."', state='".$_REQUEST['centerState']."', city='".$_REQUEST['centerCity']."', no_adult_learner='".$_REQUEST['no_adult_learner']."', teaching_language='".$_REQUEST['teachingLanguage']."', primer_type='".$_REQUEST['primerUsed']."', class_time='".$_REQUEST['classTime']."', start_date='".$_REQUEST['startDate']."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";
	mysql_query($update_original);
}