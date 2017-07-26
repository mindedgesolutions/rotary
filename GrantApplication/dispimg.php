<?php
include("../connection.php");

$arr = array();

$refappno =$_POST["refappno"];

//$refappno ='HS000001';

$query = "SELECT  `repaireimg1`, `repaireimg2`, `hygienicimg1`, `hygienicimg2`, `waterfacilityimg1`, `waterfacilityimg2`, `libimg1`, `libimg2`, `uniformimg1`, `uniformimg2`, `sportequipimg1`, `sportequipimg2`, `benchimg1`, `benchimg2`, `spaceimg1`, `spaceimg2`, `imgroofcost`, `imgfloorcost`, `imgwallcost`, `imgdoorcost`, `imgpaintcost`, `imgbenchcost`, `imgdeskcost`, `imgbenchdeskcost`, `imgwatersafecost`, `imgboystoiletcost`, `imggirlstoiletcost`, `imgteachtoiletcost`, `imgbookcost`, `imgalmirahcost`, `imguniformcost`, `imgfootwearcost`, `imgspaceprovidecost`, `imgtablecost`, `imgindoorgamecost` FROM `grantAppImage` WHERE refappno='".$refappno."' ";

$result = mysqli_query($link,$query);

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_array($result))
		{
			
		$arr[] = $row;
		}
	}
}

//	echo $str;	
echo json_encode($arr);
?>
