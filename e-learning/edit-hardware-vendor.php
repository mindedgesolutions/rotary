<?php
include('../include/config.php');

$update = "update project_elearning_vendor_details set hardware_vendor_name='".$_REQUEST['hdw_vendor_name']."', projector_model_no='".$_REQUEST['projector_model_no']."', hardware_total_unit='".$_REQUEST['hdw_total_unit']."', hardware_total_cost='".$_REQUEST['hdw_total_cost']."' where id='".$_REQUEST['dbid']."'";

mysql_query($update);