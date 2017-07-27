<?php
header('Access-Control-Allow-Origin: *'); 
include("../connection.php");
$searchstr ="";

if($_POST['volunttype']=='All')
$searchstr = $searchstr."type=type ";
else
$searchstr =$searchstr."type='".$_POST['volunttype']."' ";


	if($_POST['volunttype']=='inner wheel member') {
		if($_POST['dist']=='' ) 
			$searchstr =$searchstr."and innerWheelDistrict=innerWheelDistrict ";
			else
			$searchstr =$searchstr." and innerWheelDistrict='".$_POST['dist']."' ";
		}
	else
	{
		if($_POST['dist']=='' ) 
		$searchstr =$searchstr."and rotaryDistrict=rotaryDistrict ";
		else
		$searchstr =$searchstr."and rotaryDistrict='".$_POST['dist']."' ";
	}
	
	if($_POST['club']=='' ) 
	$searchstr = $searchstr." and rotaryClubname=rotaryClubname ";
	else
	$searchstr = $searchstr." and rotaryClubname='".$_POST['club']."' ";
	
$searchstr = $searchstr." and concat(firstname,' ',if(midname<>'',midname,''),' ',if(lastname<>'',lastname,'')) like '%".$_POST['name']."%' ";




//$volunttype = 'Rotarian';
$arr = array();

$query = "SELECT id, type,concat(firstname,' ',if(midname<>'',midname,''),' ',if(lastname<>'',lastname,'')) as  name, rotaryDistrict, rotaryClubname, address, mobile1 as phone,city,ifnull(state,'') as state, email, volunteerArea, nosofhours, timeIn,  workarea, experience, experienceDetail, img1, img2, date_format(submitted,'%d %b, %Y') as registeredon,volunteerstatus FROM registration WHERE deleted=0 and volunteerstatus=1 and ".$searchstr."  order by date(submitted) desc, id desc;";
//die(json_encode($query));

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

		
//echo json_encode($query);
?>
