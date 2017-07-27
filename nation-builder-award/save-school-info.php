<?php
include('../../include/config.php');

$check = mysql_num_rows(mysql_query("select * from project_temp_teacher_support_nation where project_no='".$_REQUEST['prno']."'"));

if ($check != $_REQUEST['schoolNo']){

	echo 1;
}else{

	$query_getDet = mysql_query("select * from project_temp_teacher_support_nation where project_no='".$_REQUEST['prno']."'");
	while ($getDet = mysql_fetch_array($query_getDet)){

		$checkSln = mysql_num_rows(mysql_query("select * from project_teacher_support_nation where project_no='".$_REQUEST['prno']."' and sln='".$getDet['sln']."'"));

		if ($checkSln == 0){

			$insert = "insert into project_teacher_support_nation(project_no, no_schools, school_id, school_name, school_type, teacher_evaluated, teacher_awarded, subject_taught, evaluation_form, image_1, image_2, image_3, sln, award_date) values('".$getDet['project_no']."', '".$getDet['no_schools']."', '".$getDet['school_id']."', '".$getDet['school_name']."', '".$getDet['school_type']."', '".$getDet['teacher_evaluated']."', '".$getDet['teacher_awarded']."', '".$getDet['subject_taught']."', '".$getDet['evaluation_form']."', '".$getDet['image_1']."', '".$getDet['image_2']."', '".$getDet['image_3']."', '".$getDet['sln']."', '".$getDet['award_date']."')";

			mysql_query($insert);

			$updateMaster = "update project_master set status='complete' where project_no='".$getDet['project_no']."'";

          	mysql_query($updateMaster);
		}else{

			$update = "update project_teacher_support_nation set school_id='".$getDet['school_id']."', school_name='".$getDet['school_name']."', school_type='".$getDet['school_type']."', teacher_evaluated='".$getDet['teacher_evaluated']."', teacher_awarded='".$getDet['teacher_awarded']."', subject_taught='".$getDet['subject_taught']."', evaluation_form='".$getDet['evaluation_form']."', image_1='".$getDet['image_1']."', image_2='".$getDet['image_2']."', image_3='".$getDet['image_3']." where project_no='".$_REQUEST['prno']."' and sln='".$getDet['sln']."'";

			mysql_query($update);

			$updateMaster = "update project_master set status='complete' where project_no='".$_REQUEST['prno']."'";

          	mysql_query($updateMaster);
		}
	}
}