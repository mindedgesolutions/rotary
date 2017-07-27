<?php
include("connection.php");

$arr = array();
$searchparm ="";
$categ = $_POST["categid"];
//$subcateg = $_POST["subcategid"];
$dist = $_POST["dist"];
$club = $_POST["club"];

/*if($subcateg=='') 
$searchparm =$searchparm." and subcategoryid = subcategoryid ";
else
$searchparm = $searchparm." and subcategoryid = $subcateg ";*/

if($categ=='') 
$searchparm =$searchparm." and categoryid = categoryid ";
else
$searchparm = $searchparm." and categoryid = $categ ";

if($dist=='')
$searchparm =$searchparm." and district = district ";
else
$searchparm =$searchparm." and district ='".$dist."'";

if($club=='')
$searchparm =$searchparm." and club = club ";
else
$searchparm =$searchparm." and club ='".$club."'";

$query = "SELECT cg.category,c.id as projectid,ifnull(title,'') as title,projdesc, state, city, district, club, projectvenue, unitsupplied, beneficiaryno, partnerorg, outlay, projectdate, projcontact, username, pwd, img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, img11, img12, img13, img14, img15, img16, img17, img18, img19, img20, img21, img22, img23, img24, img25, projectstatus,no_school,teacher_evaluated,teacher_awarded,submitted  FROM clubproject c  JOIN category cg ON cg.id=c.categoryid  where projectstatus=1 and deleted =0 ".$searchparm." order by  c.id desc,str_to_date(projectdate, '%d/%m/%Y') desc;";

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
