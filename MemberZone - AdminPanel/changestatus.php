<?php
include("../connection.php");

$arr = array();

$id= $_POST["id"];
$status= $_POST["statusval"];
$changefor = $_POST["for"];

if($status==0)
$chngstatus = 1;
else
$chngstatus = 0;	

if($changefor=='project') 
$query = "UPDATE clubproject SET projectstatus=".$chngstatus." WHERE id=".$id.";";
else	
$query = "UPDATE registration SET volunteerstatus=".$chngstatus." WHERE id=".$id.";";

$result = mysqli_query($link,$query);

if($result)
{
	
		$arr["status"] =$chngstatus;
}

		
echo json_encode($arr);
?>
