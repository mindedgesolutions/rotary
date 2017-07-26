<?php
header('Access-Control-Allow-Origin: *'); 
include("connection.php");
$searchstr ="";
$arr = array();
if($_POST["workarea"]=='All')
$searchstr =$searchstr."workarea=workarea";
else
$searchstr = $searchstr."workarea = '".$_POST["workarea"]."'"; 

if($_POST["designation"]=='')
$searchstr = $searchstr." and  designation = designation";
else 
$searchstr = $searchstr." and  designation = '".$_POST["designation"]."'";

$query = "SELECT *  FROM nationalcommitee where ".$searchstr." ;";

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
