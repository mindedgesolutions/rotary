<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=school-survey.csv');

include('include/config.php');

$msg = '';
$i = 0;

$msg = $msg."Child ID, Child Name, Donor ID, Donor Name, Registered \r\n";

$query_getDet = mysql_query("select child_id from tbl_child_selected_tagging group by child_id having count(child_id) > 1");
while ($getDet = mysql_fetch_array($query_getDet)){
	
	$query_childDet = mysql_query("select * from tbl_child_selected_tagging where child_id='".$getDet['child_id']."'");
	while ($childDet = mysql_fetch_array($query_childDet)){
		
		$childName = mysql_fetch_array(mysql_query("select child_name from tbl_child_profile_card where child_id='".$childDet['child_id']."'"));
		
		$donorName = mysql_fetch_array(mysql_query("select first_name, last_name from tbl_donar_master where donar_id='".$childDet['donar_id']."'"));
		
		$donName = $donorName['first_name'].' '.$donorName['last_name'];
		$donorName = str_replace(',', '+', $donName);
		
		$getNum = mysql_num_rows(mysql_query("select * from tbl_admin where type='donor' and idfk='".$childDet['donar_id']."'"));

		if ($getNum > 0){$registered = 'Yes';}else{$registered = 'No';}

		$msg = $msg.$childDet['child_id'].",".$childName['child_name'].",".$childDet['donar_id'].",".$donorName.",".$registered." \r\n";

		$i++;
	}
}
echo $msg;
?>