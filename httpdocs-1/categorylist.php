<?php
include("connection.php");

$arr = array();

//$query = "SELECT distinct cg.id as categoryid, cg.category FROM clubproject c JOIN subcategory sc ON sc.id=c.subcategoryid JOIN category cg ON sc.categoryid = cg.id ;";

$query = "SELECT distinct cg.id as categoryid, cg.category FROM clubproject c JOIN category cg ON c.categoryid = cg.id ;";


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
