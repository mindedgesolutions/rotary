<?php
include("../connection.php");

$query = "SELECT *  FROM DLCC;";

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




