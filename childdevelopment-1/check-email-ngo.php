<?php
include('include/config.php');


$check = mysql_num_rows(mysql_query("select * from tbl_admin where email='".$_REQUEST['txtEmail']."'"));

if ($check > 1){
	echo 1;
}