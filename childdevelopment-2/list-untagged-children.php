<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=exported-data.csv');

include('include/config.php');

$msg=$msg ."Child ID, Child Name, Father Name, Mother Name, State \r\n";

$query_getDet = mysql_query("select child_id, child_name, child_father_name, child_mother_name, state from tbl_child_profile_card where tagged='no'");
while ($getDet = mysql_fetch_array($query_getDet)){

	$childname = str_replace(",", "+", $getDet['child_name']);
	$fathername = str_replace(",", "+", $getDet['child_father_name']);
	$mothername = str_replace(",", "+", $getDet['child_mother_name']);
	$state = str_replace(",", "+", $getDet['state']);

	$msg=$msg.$getDet['child_id'].",".$childname.",".$fathername.",".$mothername.",".$state."\r\n";
		$i++;
}

echo $msg;
?>