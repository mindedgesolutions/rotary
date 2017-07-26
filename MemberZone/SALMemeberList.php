<?php
 header('Access-Control-Allow-Origin: *'); 
include("connection.php");

$arr = array();
$query = "SELECT * FROM SALRegistration ;";	

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
