<?php
include 'include/config-2.php';


$delete = "delete from video_master where SLN='".$_REQUEST['dbsln']."'";

mysql_query($delete);