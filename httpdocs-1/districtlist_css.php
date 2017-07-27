<?php
include('include/config.php');

$arr = array();

$query = "SELECT distinct district_code FROM all_district";

//$query = "select distinct(district_code) as district from all_district where status='Rotary'";

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
