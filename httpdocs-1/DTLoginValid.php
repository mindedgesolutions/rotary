<?php
session_start();
include("connection.php");

$arr = array();

$uname = $_POST["uname"];
$password = $_POST["password"];

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
$_SESSION["DTUserid"]=$arr[0]["id"];
$_SESSION["username"]=$arr[0]["uname"];
}
		
echo json_encode($arr);
?>
