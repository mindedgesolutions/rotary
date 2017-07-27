<?php
include('../../include/config.php');

$check_docs = mysql_fetch_array(mysql_query("select * from project_temp_teacher_support_nation where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'"));

if ($check_docs['evaluation_form']!='' && $check_docs['image_1']!='' && $check_docs['image_2']!='' && $check_docs['image_3']!=''){

	$update = "update project_temp_teacher_support_nation set no_schools='".$_REQUEST['schoolNo']."', school_id='".$_REQUEST['schoolId']."', school_name='".urlencode($_REQUEST['schoolName'])."', school_type='".$_REQUEST['schoolType']."', teacher_evaluated='".$_REQUEST['no_teacher_evaluated']."', teacher_awarded='".$_REQUEST['no_teacher_awarded']."', subject_taught='".$_REQUEST['subject']."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";
	mysql_query($update);

	$check = mysql_num_rows(mysql_query("select * from project_teacher_support_nation where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'"));

	if ($check > 0){

		$update_original = "update project_teacher_support_nation set no_schools='".$_REQUEST['schoolNo']."', school_id='".$_REQUEST['schoolId']."', school_name='".urlencode($_REQUEST['schoolName'])."', school_type='".$_REQUEST['schoolType']."', teacher_evaluated='".$_REQUEST['no_teacher_evaluated']."', teacher_awarded='".$_REQUEST['no_teacher_awarded']."', subject_taught='".$_REQUEST['subject']."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";
		mysql_query($update_original);
	}
}else{

	echo 1;
}