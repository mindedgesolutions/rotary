<?php
include 'include/config-2.php';

$delete = "delete from image_master where SLN='".$_REQUEST['dbsln']."'";

mysql_query($delete);