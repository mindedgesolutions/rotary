<?php
include("connection.php");

$arr = array();
$categid = $_POST["categid"];
$query = "SELECT DISTINCT `district` FROM clubproject where `categoryid`=$categid and CHAR_LENGTH(`district`) = 3";

$result = mysqli_query($link,$query);

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
		echo $arr[] = $row;
		}
	}
}		
echo json_encode($arr);
?>
