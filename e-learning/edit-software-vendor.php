<?php
include('../include/config.php');

$update = "update project_elearning_vendor_details set software_vendor_name='".$_REQUEST['sftw_vendor_name']."', language='".$_REQUEST['language']."', software_total_unit='".$_REQUEST['sftw_total_unit']."', software_total_cost='".$_REQUEST['sftw_total_cost']."' where id='".$_REQUEST['dbid_sft']."'";

mysql_query($update);