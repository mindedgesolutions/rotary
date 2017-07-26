<?php
include("connection.php");

$arr = array();
$district = $_POST["district"];
$role = $_POST["role"];

$query = "select id,name, mobNo, email FROM info where district='".$district."' and role='".$role."';";

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
