<?php
include('../include/config.php');

$update = "update project_temp_adult_literacy set end_date='".$_REQUEST['endDate']."', exam_date='".$_REQUEST['examDate']."', no_appeared='".$_REQUEST['appeared']."', no_passed='".$_REQUEST['passed']."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";

mysql_query($update);

$getImage = mysql_fetch_array(mysql_query("select * from project_temp_adult_literacy where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'"));

$update_original = "update project_adult_literacy set end_date='".$_REQUEST['endDate']."', exam_date='".$_REQUEST['examDate']."', no_appeared='".$_REQUEST['appeared']."', no_passed='".$_REQUEST['passed']."', exam_image_1='".$getImage['exam_image_1']."', exam_image_2='".$getImage['exam_image_2']."', exam_image_3='".$getImage['exam_image_3']."', exam_image_4='".$getImage['exam_image_4']."', exam_image_5='".$getImage['exam_image_5']."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";

mysql_query($update_original);
