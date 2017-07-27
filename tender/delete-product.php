<?php
include 'include/config.php';

$delete = "delete from tender_details where SLN='".$_REQUEST['dbsln']."'";

mysql_query($delete);