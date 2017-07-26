<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=tagging-count.csv');

include('include/config.php');

$msg = '';
$i = 0;

$msg = $msg."Donor ID, Donor Name, District, Club, Email, Mobile No, Tagged Count \r\n";

$query_getDet = mysql_query("select * from tbl_donar_master");

while($getDet = mysql_fetch_array($query_getDet)){

	$count = mysql_fetch_array(mysql_query("select count(child_id) as cid from tbl_child_selected_tagging where donar_id='".$getDet['donar_id']."'"));

	$donorName = $getDet['first_name'].' '.$getDet['last_name'];

	$donor_name = str_replace("," ,"+", $donorName);
	$donorClub = str_replace("," ,"+", $getDet['donar_club']);
	$donorEmail = str_replace("," ,"+", $getDet['donar_email']);
	$donorMobile = str_replace("," ,"+", $getDet['donar_contact']);

	$msg = $msg.$getDet['donar_id'].",".$donor_name.",".$getDet['donar_district'].",".$donorClub.",".$donorEmail.",".$donorMobile.",".$count['cid']." \r\n";
	$i++;
}
echo $msg;