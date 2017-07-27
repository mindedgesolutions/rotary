<?php
include("../connection.php");

$arr = array();
$dist = $_POST["dist"];
$volunteertype= $_POST["volunteertype"];

if($volunteertype=='inner wheel member') {
$query = "SELECT distinct rotaryClubname as club FROM registration where type='".$volunteertype."' and innerWheelDistrict = '".$dist."';";
} else {
$query = "SELECT distinct rotaryClubname as club FROM registration where type='".$volunteertype."' and rotaryDistrict = '".$dist."';";
}

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

		
echo json_encode($arr);
?>

