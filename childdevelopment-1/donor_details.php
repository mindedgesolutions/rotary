<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=school-survey.csv');

include('include/config.php');

$msg = '';
$i = 0;

$msg = $msg."Child ID, Name of Child, NGO, Donor Name, Donor Email, Donor Mobile, Club, District \r\n";

$query_getDet = mysql_query("select child_id, donar_id from tbl_child_selected_tagging");

while($getDet = mysql_fetch_array($query_getDet)){

	$childDet = mysql_fetch_array(mysql_query("select child_name, create_by from tbl_child_profile_card where child_id='".$getDet['child_id']."'"));

	$donorDet = mysql_fetch_array(mysql_query("select first_name, last_name, donar_email, donar_contact, donar_district, donar_club from tbl_donar_master where donar_id='".$getDet['donar_id']."'"));
	$donorName = $donorDet['first_name'].' '.$donorDet['last_name'];

	$ngo = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".$childDet['create_by']."'"));

	$childName = str_replace("," ,"+", $childDet['child_name']);
	$ngoName = str_replace("," ,"+", $ngo['center_name']);
	$dono_name = str_replace("," ,"+", $donorName);
	$donorEmail = str_replace("," ,"+", $donorDet['donar_email']);
	$donorContact = str_replace("," ,"+", $donorDet['donar_contact']);
	$donorClub = str_replace("," ,"+", $donorDet['donar_club']);
	$donorDistrict = str_replace("," ,"+", $donorDet['donar_district']);

	$msg = $msg.$getDet['child_id'].",".$childName.",".$ngoName.",".$dono_name.",".$donorEmail.",".$donorContact.",".$donorClub.",".$donorDistrict." \r\n";
	$i++;
}
echo $msg;