<?php
include("connection.php");

$arr = array();
$club = $_POST["club"];

$query = "select sum(Noofbook) as bookcnt FROM book where club='".$club."' GROUP BY club";

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
