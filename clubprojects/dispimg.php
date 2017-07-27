<?php
include("../connection.php");

$arr = array();

$id =$_POST["id"];

$query = "SELECT img1, img2, img3, img4,title  FROM clubproject c JOIN category cg ON cg.id=c.categoryid  where c.id = ".$id.";";

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

//	echo $str;	
echo json_encode($arr);
?>
