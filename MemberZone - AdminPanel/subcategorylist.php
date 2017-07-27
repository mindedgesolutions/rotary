<?php
include("../connection.php");

$categid = $_POST['categoryid'];
//$volunttype = 'Rotarian';
$arr = array();
//$query = "SELECT concat(firstname,' ', midname,' ',lastname) as  name, rotaryDistrict, rotaryClubname, email FROM registration WHERE type='".$volunttype."';";
$query = "SELECT id,subcategory FROM subcategory WHERE categoryid=".$categid.";";

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
