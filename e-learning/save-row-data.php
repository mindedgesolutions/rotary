<?php
include('../include/config.php');

$update = "update project_temp_elearning set no_schools='".$_REQUEST['schoolNo']."', school_id='".$_REQUEST['schoolId']."', school_name='".urlencode($_REQUEST['schoolName'])."', school_city='".$_REQUEST['schoolCity']."', school_type='".$_REQUEST['schoolType']."', no_students='".$_REQUEST['noStudents']."', teaching_language='".$_REQUEST['teachingLang']."', installation_date='".$_REQUEST['installDate']."', school_state='".$_REQUEST['schoolState']."', projector_or_tv='".$_REQUEST['projector']."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";
mysql_query($update);

$check = mysql_num_rows(mysql_query("select * from project_elearning where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'"));

if ($check > 0){

	$update_original = "update project_elearning set no_schools='".$_REQUEST['schoolNo']."', school_id='".$_REQUEST['schoolId']."', school_name='".urlencode($_REQUEST['schoolName'])."', school_city='".$_REQUEST['schoolCity']."', school_type='".$_REQUEST['schoolType']."', no_students='".$_REQUEST['noStudents']."', teaching_language='".$_REQUEST['teachingLang']."', installation_date='".$_REQUEST['installDate']."', school_state='".$_REQUEST['schoolState']."', projector_or_tv='".$_REQUEST['projector']."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";
	mysql_query($update_original);
}