<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=exported-data.csv');

include('include/config-2.php');

$msg=$msg ."Child ID, Child Name, NGO, Gender, Father, Mother, Address, Street, City, State, PIN \r\n";

$query_getDet = "select child_id, child_name, create_by, child_gender, child_father_name, child_mother_name, address, street, city, state, pin from tbl_child_profile_card where tbl_child_profile_card.child_id not in (select child_id from tbl_child_selected_tagging)";

//SELECT * FROM Table1 WHERE Table1.principal NOT IN (SELECT principal FROM table2)//

$result_getDet = mysql_query($query_getDet);

while ($getDet = mysql_fetch_array($result_getDet)){

	$child_name = str_replace(",","+",$getDet['child_name']);
	$father_name = str_replace(",","+",$getDet['child_father_name']);
	$mother_name = str_replace(",","+",$getDet['child_mother_name']);
	$address = str_replace(",","+",$getDet['address']);
	$street = str_replace(",","+",$getDet['street']);
	$city = str_replace(",","+",$getDet['city']);
	$state = str_replace(",","+",$getDet['state']);
	$pin = str_replace(",","+",$getDet['pin']);

	$ngoName = mysql_fetch_array(mysql_query("select center_name from tbl_admin where username='".$getDet['create_by']."'"));

	$center_name = str_replace(",","+",$ngoName['center_name']);

	$msg=$msg.$getDet['child_id'].",".$child_name.",".$center_name.",".$getDet['child_gender'].",".$father_name.",".$mother_name.",".$address.",".$street.",".$city.",".$state.",".$pin."\r\n";
	$i++;
}

echo $msg;
?>