<?php
include("connection.php");

$arr = array();
$dist = $_POST["dist"];

//$query = "SELECT id,club FROM districtclub where district = '".$dist."' ORDER BY club ASC;";

$query = "select dist_id,club_name from all_district_club where district_code = '".$dist."' ORDER BY club_name ASC";

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
