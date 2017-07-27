<?php
include('../include/config.php');

$sln = $_REQUEST['sln'] + 1;

if ($_REQUEST['sftw_vendor_name']=='' || $_REQUEST['language']=='' || $_REQUEST['sftw_total_unit']=='' || $_REQUEST['sftw_total_cost']==''){
	
}else{

	$insert = "insert into project_elearning_vendor_details(project_no, software_vendor_name, language, software_total_unit, software_total_cost, sln) values('".$_REQUEST['prno']."', '".$_REQUEST['sftw_vendor_name']."', '".$_REQUEST['language']."', '".$_REQUEST['sftw_total_unit']."', '".$_REQUEST['sftw_total_cost']."', '".$sln."')";

	mysql_query($insert);
}