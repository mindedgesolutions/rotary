<?php
include('include/config.php');

$updateName = "update tbl_donar_master set first_name='".$_REQUEST['fname']."', last_name='".$_REQUEST['lname']."' where donar_id='".$_REQUEST['donorId']."'";

mysql_query($updateName);