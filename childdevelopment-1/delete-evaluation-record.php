<?php
include('include/config.php');

$delete = "update asha_kiran_center_rating set status='' where id='".$_REQUEST['dbsln']."'";
mysql_query($delete);