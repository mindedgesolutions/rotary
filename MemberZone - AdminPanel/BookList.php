<?php
include("../connection.php");
$searchstr ="";

	if($_POST['dist']=='' ) 
	$searchstr =$searchstr."and district=district ";
	else
	$searchstr =$searchstr."and district='".$_POST['dist']."' ";
	
	
	if($_POST['club']=='' ) 
	$searchstr = $searchstr." and club=club ";
	else
	$searchstr = $searchstr." and club='".$_POST['club']."' ";
	
$arr = array();

$query = "SELECT id, name, contactno, email, Noofbook,district,club, date_format(submitdt,'%d %b, %Y') as submitdt FROM book WHERE 1 ".$searchstr;


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
