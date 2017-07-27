<?php
include("connection.php");

$arr = array();
$categid = $_POST["categid"];
$query = "SELECT distinct district FROM clubproject where categoryid=$categid and district<>'';";

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
