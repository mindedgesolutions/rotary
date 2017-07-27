<?php
include("connection.php");

$arr = array();

$categid= $_POST["categid"];

$query = "SELECT distinct sc.id as subcategoryid, sc.subcategory FROM clubproject c JOIN subcategory sc ON sc.id=c.subcategoryid WHERE sc.categoryid=$categid;";

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
