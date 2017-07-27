<?php
include('../include/config.php');

$check = mysql_num_rows(mysql_query("select * from project_elearning_vendor_details where project_no='".$_REQUEST['prno']."'"));

if ($check == 0){

	$query_getDet = mysql_query("select * from grant_vendor_details where grant_no='".$_REQUEST['grantNo']."'");
	while ($getDet = mysql_fetch_array($query_getDet)){

  		$insert = "insert into project_elearning_vendor_details(project_no, hardware_vendor_name, projector_model_no, hardware_total_unit, hardware_total_cost, software_vendor_name, language, software_total_unit, software_total_cost) values('".$_REQUEST['prno']."', '".$getDet['hardware_vendor_name']."', '".$getDet['projector_model_no']."', '".$getDet['hardware_total_unit']."', '".$getDet['hardware_total_cost']."', '".$getDet['software_vendor_name']."', '".$getDet['language']."', '".$getDet['software_total_unit']."', '".$getDet['software_total_cost']."')";

  		mysql_query($insert);
	}
}else{

	$query_getDet = mysql_query("select * from grant_vendor_details where grant_no='".$_REQUEST['grantNo']."'");
	while ($getDet = mysql_fetch_array($query_getDet)){

		$update = "update project_elearning_vendor_details set hardware_vendor_name='".$getDet['hardware_vendor_name']."', projector_model_no='".$getDet['projector_model_no']."', hardware_total_unit='".$getDet['hardware_total_unit']."', hardware_total_cost='".$getDet['hardware_total_cost']."', software_vendor_name='".$getDet['software_vendor_name']."', language='".$getDet['language']."', software_total_unit='".$getDet['software_total_unit']."', software_total_cost='".$getDet['software_total_cost']."' where project_no='".$_REQUEST['prno']."'";

  		mysql_query($update);
  	}
}