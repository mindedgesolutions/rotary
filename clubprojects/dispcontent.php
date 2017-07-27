<?php
include("../connection.php");

$arr = array();

$id =$_POST["id"];

$query = "SELECT cg.category,ifnull(title,'') as title, projdesc, state, city, district, club, projectvenue, unitsupplied,  beneficiaryno, partnerorg, outlay, projectdate, projcontact, username, pwd, img1, img2, img3, img4  FROM clubproject c JOIN category cg ON cg.id=c.categoryid  where c.id = ".$id.";";

$result = mysqli_query($link,$query);
$str = $str.'<div style="width:800px; font-family:Arial, Helvetica, sans-serif; color:#333333; text-align:justify; padding:5px 7px">';

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			
			$str = $str."<strong style='color:#990000; text-transform:uppercase'><u>".$row["title"].'</u></strong><br /><br />';
			$str = $str.'<strong><em>Club :&nbsp;</strong></em> '.$row["club"].'<br /><br />';
			$str = $str.'<strong><em>State :&nbsp;</strong></em> '.$row["state"].'<br /><br />';
			$str = $str.'<strong><em>City :&nbsp;</strong></em> '.$row["city"].'<br /><br />';
			$str = $str.'<strong><em>Detail :&nbsp;</strong></em> '.$row["projdesc"].'<br /><br />';
			$str = $str.'<strong><em>Venue :&nbsp;</strong></em> '.$row["projectvenue"].'<br /><br />';
			$str = $str.'<strong><em>Contact Detail :&nbsp;</strong></em> '.$row["projcontact"].'<br /><br />';
			$str = $str.'<strong><em>Unit Supplied :&nbsp;</strong></em> '.$row["unitsupplied"].'<br /><br />';
			$str = $str.'<strong><em>Beneficiary No. :&nbsp;</strong></em> '.$row["beneficiaryno"].'<br /><br />';
			$str = $str.'<strong><em>Partnering Organization / Agency :&nbsp;</strong></em> '.$row["partnerorg"].'<br /><br />';
			$str = $str.'<strong><em>Outlay :&nbsp;</strong></em> <img src="http://rotaryteach.org/images/rupees_icon.jpg" />'.$row["outlay"].'<br /><br />';
			$str = $str.'<strong><em>Project Date :&nbsp;</strong></em> '.$row["projectdate"].'<br />';
		}
	}
}
$str = $str.'</div>';

	echo $str;	
//echo json_encode($str);
?>
