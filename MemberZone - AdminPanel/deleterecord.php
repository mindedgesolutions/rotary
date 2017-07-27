<?php
include("../connection.php");

$arr = array();

$id= $_POST["id"];
$from  = $_POST["from"];

if($from=='project')
$query = "UPDATE clubproject SET deleted=1 WHERE id=".$id.";";
else if($from=='volunteer')
$query = "UPDATE registration SET deleted=1 WHERE id=".$id.";";

$result = mysqli_query($link,$query);

if($result)
{
	
		$arr["result"] =1;
}

		
echo json_encode($arr);
?>
