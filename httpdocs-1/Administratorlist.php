<?php
include("connection.php");

$arr = array();
if($_POST["district"]=='All')
$searchstr = "district=district";
else
$searchstr = "district='".$_POST["district"]."'";

$query = "SELECT * FROM info WHERE 1 and ".$searchstr." order by district asc,serialorder asc";	

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
