<?php
include("../connection.php");

$arr = array();


$refappno = $_POST["refappno"];

//$query = "SELECT id,GA.`refappno`,`granttitle`,  GA.`belongto`,GA.`district`, `qualifstatus`,approvebyPCP FROM `grantApplication` GA JOIN grantAppEligible GAE ON GAE.refappno=GA.`refappno`  WHERE  GA.`refappno`='".$refappno."';";

$query = "SELECT id,GAE.`refappno`,`granttitle`,  GAE.`belongto`,GAE.`district`, `qualifstatus`,approvebyPCP FROM `grantApplication` GA RIGHT JOIN grantAppEligible GAE ON GAE.refappno=GA.`refappno`  WHERE  GAE.`refappno`='".$refappno."';";

$result = mysqli_query($link,$query);

if($result) {
	while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
}
		
echo json_encode($arr);
?>
