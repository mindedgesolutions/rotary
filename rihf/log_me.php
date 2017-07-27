<?php
session_start();
ob_start();
include("admin/includes/connect.php");
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];

$query=mysql_query("select * from login where email='$email' and pass='$pass'");
if(mysql_num_rows($query)>0)
{
  $rec=mysql_fetch_array($query);
  $status=$rec['status'];
   if($status=="unverified")
   {
   header("location:login.php?msg=2");
   }
   else
  {
  $_SESSION['uid']=$email;
  header("location:my_home.php?ht=home");
  }
}
else
{
header("location:login.php?msg=1");
}
?>
