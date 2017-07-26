<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=approved-children.csv');

include('include/config.php');

$msg = '';
$i = 0;

$msg = $msg."Child Name, Gender, Child Age, Father Name, Mother Name, Guardian Name, Address, Street, City, State, NGO \r\n";

$username = mysql_fetch_array(mysql_query("select center_name, username from tbl_admin where id='".$_REQUEST['ngoid']."'"));

$query_getDet = mysql_query("select * from tbl_child_profile_card where create_by='".$username['username']."'");

while($getDet = mysql_fetch_array($query_getDet))
{

	$child_name = str_replace(',', '+', $getDet['child_name']);
	$child_gender = str_replace(',', '+', $getDet['child_gender']);
	$child_dob = str_replace(',', '+', $getDet['child_dob']);
	$child_father_name = str_replace(',', '+', $getDet['child_father_name']);
	$child_mother_name = str_replace(',', '+', $getDet['child_mother_name']);
	$child_guardian_name = str_replace(',', '+', $getDet['child_guardian_name']);
	$address = str_replace(',', '+', $getDet['address']);
	$street = str_replace(',', '+', $getDet['street']);
	$city = str_replace(',', '+', $getDet['city']);
	$state = str_replace(',', '+', $getDet['state']);
	$ngo = str_replace(',', '+', $username['center_name']);

	$msg = $msg.$child_name.",".$child_gender.",".$child_dob.",".$child_father_name.",".$child_mother_name.",".$child_guardian_name.",".$address.",".$street.",".$city.",".$state.",".$ngo." \r\n";
	$i++;
}
echo $msg;
?>