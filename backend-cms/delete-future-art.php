<?php
include 'include/config-2.php';

$delete = "delete from future_act where SLN='".$_REQUEST['dbsln']."'";

mysql_query($delete);