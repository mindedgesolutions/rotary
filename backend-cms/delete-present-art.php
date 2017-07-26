<?php
include 'include/config-2.php';

$delete = "delete from present_act where SLN='".$_REQUEST['dbsln']."'";

mysql_query($delete);