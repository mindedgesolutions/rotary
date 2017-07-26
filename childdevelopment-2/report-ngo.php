<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=donor-report.csv');

include('include/config.php');

$msg = '';
$i = 0;

$msg = $msg."Child ID, Child Name, Donor ID, Donor Name, Registered, NGO \r\n";

//$nameArray = array('Digambarpur Angikar', 'Amiya', 'A.Ramesh', 'Mr. Amar Chavan');

/*$query_getDet = mysql_query("select * from tbl_child_selected_tagging");

while($getDet = mysql_fetch_array($query_getDet))
{
	$ngo_Name = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='Digambarpur Angikar'"));
	$ngoName = $donorName = str_replace(',', '+', $ngo_Name['center_name']);

	$query_childDet = mysql_query("select * from tbl_child_profile_card where child_id='".$getDet['child_id']."' and create_by='Digambarpur Angikar'");

	while ($childDet = mysql_fetch_array($query_childDet)){

		$donorDet = mysql_fetch_array(mysql_query("select first_name, last_name from tbl_donar_master where donar_id='".$childDet['donar_id']."'"));
		echo $t = "select first_name, last_name from tbl_donar_master where donar_id='".$childDet['donar_id']."'";

		$donName = $childDet['first_name'].' '.$childDet['last_name'];
		$donorName = str_replace(',', '+', $donName);

		$msg = $msg.$getDet['child_id'].",".$childDet['child_name'].",".$getDet['donar_id'].",".$donorName.",".$ngoName." \r\n";

		$i++;
	}
}
echo $msg;*/


$query_childDet = mysql_query("select * from tbl_child_profile_card where create_by='Amiya'");

while ($childDet = mysql_fetch_array($query_childDet)){

	$query_getDet = mysql_query("select * from tbl_child_selected_tagging where child_id='".$childDet['child_id']."'");

	while ($getDet = mysql_fetch_array($query_getDet)){

		$donor_name = mysql_fetch_array(mysql_query("select first_name, last_name from tbl_donar_master where donar_id='".$getDet['donar_id']."'"));

		$getNum = mysql_num_rows(mysql_query("select * from tbl_admin where idfk='".$getDet['donar_id']."'"));

		if ($getNum > 0){$registered = 'Yes';}else{$registered = 'No';}

		$donName = $donor_name['first_name'].' '.$donor_name['last_name'];
		$donorName = str_replace(',', '+', $donName);

		$childName = mysql_fetch_array(mysql_query("select child_name from tbl_child_profile_card where child_id='".$getDet['child_id']."'"));

		$msg = $msg.$getDet['child_id'].",".$childName['child_name'].",".$getDet['donar_id'].",".$donorName.",".$registered.",TEACH CHILDREN BUILD INDIA \r\n";

		$i++;
	}
}
echo $msg;
?>