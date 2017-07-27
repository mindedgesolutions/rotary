<?php
include('../include/config.php');

$check = mysql_num_rows(mysql_query("select * from project_temp_adult_literacy where project_no='".$_REQUEST['prno']."'"));

if ($check != $_REQUEST['centerNo']){

	echo 1;
}else{

	$query_getDet = mysql_query("select * from project_temp_adult_literacy where project_no='".$_REQUEST['prno']."'");
	while ($getDet = mysql_fetch_array($query_getDet)){

		$checkSln = mysql_num_rows(mysql_query("select * from project_adult_literacy where project_no='".$_REQUEST['prno']."' and sln='".$getDet['sln']."'"));

		if ($checkSln == 0){

			$insert = "insert into project_adult_literacy(project_no, no_centers, center_id, center_name, state, city, no_adult_learner, teaching_language, primer_type, class_time, start_date, image_1, image_2, image_3, image_4, image_5, sln) values('".$getDet['project_no']."', '".$getDet['no_centers']."', '".$getDet['center_id']."', '".$getDet['center_name']."', '".$getDet['state']."', '".$getDet['city']."', '".$getDet['no_adult_learner']."', '".$getDet['teaching_language']."', '".$getDet['primer_type']."', '".$getDet['class_time']."', '".$getDet['start_date']."', '".$getDet['image_1']."', '".$getDet['image_2']."', '".$getDet['image_3']."', '".$getDet['image_4']."', '".$getDet['image_5']."', '".$getDet['sln']."')";

			mysql_query($insert);
		}else{

			$update = "update project_adult_literacy set center_id='".$getDet['center_id']."', center_name='".$getDet['center_name']."', state='".$getDet['state']."', city='".$getDet['city']."', no_adult_learner='".$getDet['no_adult_learner']."', teaching_language='".$getDet['teaching_language']."', primer_type='".$getDet['primer_type']."', class_time='".$getDet['class_time']."', start_date='".$getDet['start_date']."', image_1='".$getDet['image_1']."', image_2='".$getDet['image_2']."', image_3='".$getDet['image_3']."', image_4='".$getDet['image_4']."', image_5='".$getDet['image_5']."' where project_no='".$_REQUEST['prno']."' and sln='".$getDet['sln']."'";

			mysql_query($update);
		}
	}
}