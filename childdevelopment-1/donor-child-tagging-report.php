<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=school-survey.csv');

include('include/config.php');

$msg = '';
$i = 0;

$msg = $msg."Donor Name, Club, Child ID, Child Name, Father Name, DOB, NGO \r\n";

$query_getDet = mysql_query("select * from tbl_child_selected_tagging");

while($getDet = mysql_fetch_array($query_getDet)){

	$childDet = mysql_fetch_array(mysql_query("select child_name, child_father_name, child_dob, create_by from tbl_child_profile_card where child_id='".$getDet['child_id']."'"));

	$donorDet = mysql_fetch_array(mysql_query("select first_name, last_name, donar_email, donar_contact, donar_district, donar_club from tbl_donar_master where donar_id='".$getDet['donar_id']."'"));

	$donorName = $donorDet['first_name'].' '.$donorDet['last_name'];

	$ngo = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".$childDet['create_by']."'"));

	$dono_name = str_replace("," ,"+", $donorName);
	$donorClub = str_replace("," ,"+", $donorDet['donar_club']);
	$childName = str_replace("," ,"+", $childDet['child_name']);
	$childFather = str_replace("," ,"+", $childDet['child_father_name']);
	$childDob = str_replace("," ,"+", $childDet['child_dob']);
	$ngoName = str_replace("," ,"+", $ngo['center_name']);

	$msg = $msg.$getDet['child_id'].",".$dono_name.",".$donorClub.",".$childName.",".$childFather.",".$childDob.",".$ngoName." \r\n";
	$i++;
}
echo $msg;