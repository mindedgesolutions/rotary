<?php
include("connection.php");
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
	
	
if($_POST['city']=='')
$searchstr = $searchstr." and city=city ";
else
$searchstr =$searchstr." and city='".$_POST['city']."' ";

	
$voluntarr = explode(',',$_POST['voluntarea']);

if(count($voluntarr)>0 ) {
	$searchstr =$searchstr." and (";
	for($i=0; $i<count($voluntarr); $i++) {
		$volunteerstr = $volunteerstr." volunteerArea like '%".$voluntarr[$i]."%' or ";
	}
	$volunteerstr=rtrim($volunteerstr,' or ');
$searchstr =$searchstr.$volunteerstr.")";
}
else
$searchstr =$searchstr." and volunteerArea =volunteerArea ";


$workareaarr = explode(',',$_POST['workarea']);

if(count($workareaarr)>0 ) {
	$searchstr =$searchstr." and (";
	for($i=0; $i<count($workareaarr); $i++) {
		$workareastr = $workareastr." workarea like '%".$workareaarr[$i]."%' or ";
	}
	$workareastr=rtrim($workareastr,' or ');
$searchstr =$searchstr.$workareastr.")";
}
else
$searchstr =$searchstr." and workarea =workarea ";


//$volunttype = 'Rotarian';
$arr = array();

$query = "SELECT id, type,concat(firstname,' ',if(midname<>'',midname,''),' ',if(lastname<>'',lastname,'')) as  name, rotaryDistrict, rotaryClubname, address, phone,city,ifnull(state,'') as state, email, volunteerArea, nosofhours, timeIn,  workarea, experience, experienceDetail, img1, img2, date_format(submitted,'%d %b, %Y') as registeredon,volunteerstatus FROM registration WHERE deleted=0 and ".$searchstr."  order by date(submitted) desc, id desc;";

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
