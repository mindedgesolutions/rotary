<?php
include 'include/config.php';

$activate = "update tender_product_master set status='active' where product_id='".$_REQUEST['dbsln']."'";

mysql_query($activate);