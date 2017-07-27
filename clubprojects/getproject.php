<?php
include("../connection.php");

$projid = $_POST['projid'];
//$volunttype = 'Rotarian';
$arr = array();

//$query = "SELECT sc.categoryid,cp.* FROM clubproject cp JOIN subcategory sc ON sc.id=cp.subcategoryid WHERE cp.id=".$projid.";";

$query = "SELECT cp.* FROM clubproject cp  WHERE cp.id=".$projid.";";

//die($query);
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
