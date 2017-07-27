<?php
include("connection.php");

$arr = array();
$searchparm ="";
$categ = $_POST["categid"];
$subcateg = $_POST["subcategid"];
$dist = $_POST["dist"];
$club = $_POST["club"];

if($subcateg=='') 
$searchparm =$searchparm." and subcategoryid = subcategoryid ";
else
$searchparm = $searchparm." and subcategoryid = $subcateg ";

if($dist=='')
$searchparm =$searchparm." and district = district ";
else
$searchparm =$searchparm." and district ='".$dist."'";

if($club=='')
$searchparm =$searchparm." and club = club ";
else
$searchparm =$searchparm." and club ='".$club."'";

$query = "SELECT cg.category,sc.subcategory ,c.id as projectid,title, subcategoryid, projdesc, state, city, district, club, projectvenue, unitsupplied, beneficiaryno, partnerorg, outlay, projectdate, projcontact, username, pwd, img1, img2, img3, img4  FROM clubproject c JOIN subcategory sc ON sc.id= c.subcategoryid  JOIN category cg ON cg.id=sc.categoryid  where  1 ".$searchparm." order by str_to_date(projectdate, '%d/%m/%Y') desc;";

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
