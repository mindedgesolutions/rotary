<?php
include("../connection.php");
$user = $_POST['user'];
$arr = array();

//$query = "SELECT concat(firstname,' ', midname,' ',lastname) as  name, rotaryDistrict, rotaryClubname, email FROM registration WHERE type='".$volunttype."';";

$query = "SELECT count(id) as cnt FROM clubproject where username='".$user."';";

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
