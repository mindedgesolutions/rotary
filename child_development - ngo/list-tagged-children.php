<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=exported-data.csv');

include('include/config.php');

$msg=$msg ."Child ID, Child Name, Father Name, Mother Name, State, NGO, Donor ID, Donor Name \r\n";

$query_getDet = mysql_query("select child_id, donar_id from tbl_child_selected_tagging");
while ($getDet = mysql_fetch_array($query_getDet)){

	$childDet = mysql_fetch_array(mysql_query("select child_name, child_father_name, child_mother_name, state, create_by from tbl_child_profile_card where child_id='".$getDet['child_id']."'"));

	$ngo = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".$childDet['create_by']."'"));

	$donorDet = mysql_fetch_array(mysql_query("select id, first_name, last_name from tbl_donar_master where id='".$getDet['donar_id']."'"));

	$childname = str_replace(",", "+", $childDet['child_name']);
	$fathername = str_replace(",", "+", $childDet['child_father_name']);
	$mothername = str_replace(",", "+", $childDet['child_mother_name']);
	$state = str_replace(",", "+", $childDet['state']);
	$ngo = str_replace(",", "+", $ngo['center_name']);

	$msg=$msg.$getDet['child_id'].",".$getDet['Registration_Date'].",".$patientName.",".$getName['Mobile_No']."\r\n";
		$i++;
}

echo $msg;
?>