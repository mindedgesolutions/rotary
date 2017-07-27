<?php
include('../../include/config.php');

if ($_REQUEST['additional_teacher']==''){
	$total_teacher = 2;
}else{
	$total_teacher = $_REQUEST['additional_teacher'];
}

$check = mysql_num_rows(mysql_query("select * from project_temp_teacher_support_training where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'"));

if ($check==0){
	$insert = "insert into project_temp_teacher_support_training(project_no, training_type, no_schools, school_id, school_name, school_type, city, state, teacher_name_1, student_no_1, teacher_name_2, student_no_2, total_teacher, total_student, upload_date, sln) values('".$_REQUEST['projectId']."', '".$_REQUEST['trainingType']."', '".$_REQUEST['no_schools']."', '".$_REQUEST['schoolId']."', '".$_REQUEST['schoolName']."', '".$_REQUEST['schoolType']."', '".$_REQUEST['schoolCity']."', '".$_REQUEST['schoolState']."', '".$_REQUEST['teacher_name_1']."', '".$_REQUEST['no_student_1']."', '".$_REQUEST['teacher_name_2']."', '".$_REQUEST['no_student_2']."', '".$total_teacher."', '".$_REQUEST['additional_students']."', '".date('Y-m-d')."', '".$_REQUEST['sln']."')";

	mysql_query($insert);

}else{
	$update = "update project_temp_teacher_support_training set school_id='".$_REQUEST['schoolId']."', school_name='".$_REQUEST['schoolName']."', school_type='".$_REQUEST['schoolType']."', city='".$_REQUEST['schoolCity']."', state='".$_REQUEST['schoolState']."', teacher_name_1='".$_REQUEST['teacher_name_1']."', student_no_1='".$_REQUEST['no_student_1']."', teacher_name_2='".$_REQUEST['teacher_name_2']."', student_no_2='".$_REQUEST['no_student_2']."', total_teacher='".$total_teacher."', total_student='".$_REQUEST['additional_students']."' where project_no='".$_REQUEST['projectId']."' and sln='".$_REQUEST['sln']."'";

	mysql_query($update);
}