<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=exported-data.csv');

include('include/config.php');

$msg=$msg ."Child ID, Child Name, Father Name, Mother Name, Donor Name, NGO \r\n";

//$query_getDet = "select child_id, donar_id, child_name from tbl_child_selected_tagging order by child_name asc";

$query_getDet = "SELECT tbl_child_selected_tagging.child_id, tbl_child_selected_tagging.donar_id FROM tbl_child_selected_tagging INNER JOIN tbl_child_profile_card ON tbl_child_selected_tagging.child_id=tbl_child_profile_card.child_id ORDER BY tbl_child_profile_card.child_name";

$result_getDet = mysql_query($query_getDet);

while ($getDet = mysql_fetch_array($result_getDet)){

	$getName = mysql_fetch_array(mysql_query("select child_name, child_father_name, child_mother_name, create_by from tbl_child_profile_card where child_id='".$getDet['child_id']."'"));

	$child_name = str_replace(",","+",$getName['child_name']);
	$father_name = str_replace(",","+",$getName['child_father_name']);
	$mother_name = str_replace(",","+",$getName['child_mother_name']);

	$donorName = mysql_fetch_array(mysql_query("select first_name, last_name from tbl_donar_master where donar_id='".$getDet['donar_id']."'"));

	$d_name = $donorName['first_name'].' '.$donorName['last_name'];

	$donor_name = str_replace(",","+",$d_name);

	$ngoName = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".$getName['create_by']."'"));

	$center_name = str_replace(",","+",$ngoName['center_name']);

	$msg=$msg.$getDet['child_id'].",".$child_name.",".$father_name.",".$mother_name.",".$donor_name.",".$center_name."\r\n";
	$i++;
}

echo $msg;
?>