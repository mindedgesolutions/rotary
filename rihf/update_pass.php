<?php
session_start();
ob_start();
include("admin/includes/connect.php"); 

$email=$_SESSION['uid'];



$name=$_REQUEST['pass'];



$query23="UPDATE login SET pass='$name' where email='$email'";
$result23=mysql_query($query23);

header("location:my_home.php?ht=home");
?>