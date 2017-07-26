<?php
include("../connection.php");

$arr = array();

if($_POST["district"]=='all') {
$query = "SELECT district,club,`refappno`,if(approvebyCP='','No',approvebyCP) as approvebyCP, if(approvebyPCP='','No',approvebyPCP) as approvebyPCP, if(approvebyDLCC='','No',approvebyDLCC) as approvebyDLCC, if(approvebyDG='','No',approvebyDG) as approvebyDG, if(approvebyRILMCEO='','No',approvebyRILMCEO) as approvebyRILMCEO ,if(approvebyRILMCP='','No',approvebyRILMCP) as approvebyRILMCP  FROM `grantAppEligible` ;";

}
else {
$district = $_POST["district"];
$club = $_POST["club"];

$query = "SELECT district ,club,`refappno`,if(approvebyCP='','No',approvebyCP) as approvebyCP, if(approvebyPCP='','No',approvebyPCP) as approvebyPCP, if(approvebyDLCC='','No',approvebyDLCC) as approvebyDLCC, if(approvebyDG='','No',approvebyDG) as approvebyDG, if(approvebyRILMCEO='','No',approvebyRILMCEO) as approvebyRILMCEO ,if(approvebyRILMCP='','No',approvebyRILMCP) as approvebyRILMCP  FROM `grantAppEligible` WHERE district='".$district."' and club='".$club."' ;";

}

$result = mysqli_query($link,$query);

if($result) {
	while($row = mysqli_fetch_assoc($result))
		{
		$arr[] = $row;
		}
}
		
echo json_encode($arr);
?>
