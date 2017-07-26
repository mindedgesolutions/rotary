<?php
include('include/config.php');
$q = intval($_GET['q']);
$arr = array();

//$query = "SELECT distinct district_code FROM all_district";
//$sql="select DISTINCT(club_name) from all_district WHERE district_code = '".$q."'";

$query = "select distinct(district_code) as district from all_district where status='Rotary'";

$result = mysql_query($query);

if($result)
{
	while($row = mysql_fetch_array($result))
	{
		$arr[] = $row;
	}
}
		
echo json_encode($arr);
?>

