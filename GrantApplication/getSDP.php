<?php
include("../connection.php");

$arr = array();

$refappno = $_POST["refappno"];

//$grantAppuserid = 1;

$query = "SELECT HSADPs as ADPfacility FROM grantAppEligible WHERE refappno='".$refappno."';";


$result = mysqli_query($link,$query);

if($result) {
	while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
}
		
echo json_encode($arr);
?>
