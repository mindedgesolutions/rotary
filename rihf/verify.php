<?php
session_start();
ob_start();
include("admin/includes/connect.php");
$vcode=$_REQUEST['vc'];
$email=$_REQUEST['em'];
$query=mysql_query("select * from login where email='$email' and vcode='$vcode'");
if(mysql_num_rows($query)>0)
{
$rec=mysql_fetch_array($query);
$query1=mysql_query("update login set status='verified' where email='$email' and vcode='$vcode'");
if()
$q2=mysql_query("SELECT * from reg where email='$email' and vkey='$vcode'");
$rec2=mysql_fetch_array($q2);
$name=$rec2['name'];
header("location:signup_status.php?msg=2&nam=$email");
}
?>
