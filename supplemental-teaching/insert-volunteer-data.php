<?php
include('../../include/config.php');

if ($_REQUEST['dance']=='undefined'){$dance = '';}else{$dance = $_REQUEST['dance'];}

if ($_REQUEST['music']=='undefined'){$music = '';}else{$music = $_REQUEST['music'];}

if ($_REQUEST['art']=='undefined'){$art = '';}else{$art = $_REQUEST['art'];}

if ($_REQUEST['sports']=='undefined'){$sports = '';}else{$sports = $_REQUEST['sports'];}

if ($_REQUEST['other']=='undefined'){$other = '';}else{$other = $_REQUEST['other'];}

if ($_REQUEST['science']=='undefined'){$science = '';}else{$science = $_REQUEST['science'];}

if ($_REQUEST['abacus']=='undefined'){$abacus = '';}else{$abacus = $_REQUEST['abacus'];}

if ($_REQUEST['reading']=='undefined'){$reading = '';}else{$reading = $_REQUEST['reading'];}

if ($_REQUEST['spelling']=='undefined'){$spelling = '';}else{$spelling = $_REQUEST['spelling'];}

if ($_REQUEST['writing']=='undefined'){$writing = '';}else{$writing = $_REQUEST['writing'];}

if ($_REQUEST['general_knowledge']=='undefined'){$general_knowledge = '';}else{$general_knowledge = $_REQUEST['general_knowledge'];}

$curricular = $dance.','.$music.','.$art.','.$sports;
$subject = $science.','.$abacus.','.$reading.','.$spelling.','.$writing.','.$general_knowledge;

$check = mysql_num_rows(mysql_query("select * from project_temp_teacher_support_supplement where sln='".$_REQUEST['sln']."' and school_id='".$_REQUEST['schoolId']."' and volunteer_sln='".$_REQUEST['volunteer_sln']."' and project_no='".$_REQUEST['projectId']."'"));

if ($check==0){

	$insert = "insert into project_temp_teacher_support_supplement(project_no, no_schools, sln, school_id, school_name, city, state, volunteer_sln, volunteer_name, co_curricular, co_curricular_other, subject_support, subject_support_other, total_hours, total_students) values('".$_REQUEST['projectId']."', '".$_REQUEST['schools_involved']."', '".$_REQUEST['sln']."', '".$_REQUEST['schoolId']."', '".$_REQUEST['schoolName']."', '".$_REQUEST['schoolCity']."', '".$_REQUEST['schoolState']."', '".$_REQUEST['volunteer_sln']."', '".$_REQUEST['volunteer_name']."', '".$curricular."', '".$_REQUEST['curricular_other']."', '".$subject."', '".$_REQUEST['support_other']."', '".$_REQUEST['total_hours']."', '".$_REQUEST['student_taught']."')";

	mysql_query($insert);
}else{

	$update = "update project_temp_teacher_support_supplement set volunteer_name='".$_REQUEST['volunteer_name']."', co_curricular='".$curricular."', co_curricular_other='".$_REQUEST['curricular_other']."', subject_support='".$subject."', subject_support_other='".$_REQUEST['support_other']."', total_hours='".$_REQUEST['total_hours']."', total_students='".$_REQUEST['student_taught']."' where sln='".$_REQUEST['sln']."' and school_id='".$_REQUEST['schoolId']."' and volunteer_sln='".$_REQUEST['volunteer_sln']."'";

	mysql_query($update);
}