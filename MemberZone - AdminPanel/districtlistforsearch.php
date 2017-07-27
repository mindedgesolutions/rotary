<?php
include("../connection.php");

$arr = array();

$volunteertype= $_POST["volunteertype"];

if($volunteertype=='inner wheel member') {
$query = "SELECT distinct innerWheelDistrict as district FROM registration where type='".$volunteertype."' and innerWheelDistrict is not null;";
}
else
{$query = "SELECT distinct rotaryDistrict as district FROM registration where type='".$volunteertype."' and rotaryDistrict is not null;";

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
