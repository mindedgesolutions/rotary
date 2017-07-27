<?php
include('../include/config.php');

$sln = $_REQUEST['sln'] + 1;

if ($_REQUEST['hdw_vendor_name']=='' || $_REQUEST['projector_model_no']=='' || $_REQUEST['hdw_total_unit']=='' || $_REQUEST['hdw_total_cost']==''){
	
}else{

	$insert = "insert into project_elearning_vendor_details(project_no, hardware_vendor_name, projector_model_no, hardware_total_unit, hardware_total_cost, sln) values('".$_REQUEST['prno']."', '".$_REQUEST['hdw_vendor_name']."', '".$_REQUEST['projector_model_no']."', '".$_REQUEST['hdw_total_unit']."', '".$_REQUEST['hdw_total_cost']."', '".$sln."')";

	mysql_query($insert);
}