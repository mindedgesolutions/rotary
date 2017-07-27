<?php
include('../include/config.php');

$check = mysql_num_rows(mysql_query("select * from project_temp_elearning where project_no='".$_REQUEST['prno']."'"));

if ($check != $_REQUEST['schoolNo']){

	echo 1;
}else{

	$query_getDet = mysql_query("select * from project_temp_elearning where project_no='".$_REQUEST['prno']."'");
	while ($getDet = mysql_fetch_array($query_getDet)){

		$checkSln = mysql_num_rows(mysql_query("select * from project_elearning where project_no='".$_REQUEST['prno']."' and sln='".$getDet['sln']."'"));

		if ($checkSln == 0){

			$insert = "insert into project_elearning(project_no, no_schools, school_id, school_name, school_city, school_type, no_students, teaching_language, installation_date, requirement_letter, satisfaction_letter, image_1, image_2, image_3, upload_date, sln, school_state, projector_or_tv) values('".$getDet['project_no']."', '".$getDet['no_schools']."', '".$getDet['school_id']."', '".$getDet['school_name']."', '".$getDet['school_city']."', '".$getDet['school_type']."', '".$getDet['no_students']."', '".$getDet['teaching_language']."', '".$getDet['installation_date']."', '".$getDet['requirement_letter']."', '".$getDet['satisfaction_letter']."', '".$getDet['image_1']."', '".$getDet['image_2']."', '".$getDet['image_3']."', '".date('Y-m-d')."', '".$getDet['sln']."', '".$getDet['school_state']."', '".$getDet['projector_or_tv']."')";

			mysql_query($insert);
		}else{

			$update = "update project_elearning set school_id='".$getDet['school_id']."', school_name='".$getDet['school_name']."', school_city='".$getDet['school_city']."', school_type='".$getDet['school_type']."', no_students='".$getDet['no_students']."', teaching_language='".$getDet['teaching_language']."', installation_date='".$getDet['installation_date']."', requirement_letter='".$getDet['requirement_letter']."', satisfaction_letter='".$getDet['satisfaction_letter']."', image_1='".$getDet['image_1']."', image_2='".$getDet['image_2']."', image_3='".$getDet['image_3']."', school_state='".$getDet['school_state']."', projector_or_tv='".$getDet['projector_or_tv']."' where project_no='".$_REQUEST['prno']."' and sln='".$getDet['sln']."'";

			mysql_query($update);
		}
	}
}