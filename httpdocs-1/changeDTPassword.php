<?php
session_start();
include("connection.php");

$arr = array();

$uname = $_POST["uname"];
$password = $_POST["password"];
$newpassword = $_POST["newpwd"];

$query = "SELECT * FROM districttrackerUser WHERE uname='".$uname."' and pwd='".$password."';";

$result = mysqli_query($link,$query);

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
	}
}
if(count($arr)>0) {
$updtquery = "UPDATE districttrackerUser SET pwd='".$newpassword."' WHERE uname='".$uname."' and pwd='".$password."';";
	
$updtresult = mysqli_query($link,$updtquery);
	if($updtresult)
	{
		$status = 1;
		$msg =  "Password successfully change. You can login with new password.";
	}

}
else
	{
	$status = 0;
	$msg = "Invalid Username and Password.";	
	}
	
	$finalarr = array();
	$finalarr['status'] = $status;
	$finalarr['msg'] = $msg;
	
	
		
echo json_encode($finalarr);
?>
