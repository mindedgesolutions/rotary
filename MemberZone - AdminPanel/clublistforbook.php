<?php
include("../connection.php");

$arr = array();
$dist = $_POST["dist"];
$query = "SELECT distinct club FROM book where district = '".$dist."';";

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

