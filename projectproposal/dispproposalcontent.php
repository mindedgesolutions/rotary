<?php
include("../connection.php");

$arr = array();

$id =$_POST["id"];

$query = "SELECT id,district,club,projectname,projectdesc,noofpersonneeded ,submitdt FROM projectproposal where id = ".$id.";";

$result = mysqli_query($link,$query);
$str = $str.'<div style="width:800px; font-family:Arial, Helvetica, sans-serif; color:#333333; text-align:justify; padding:5px 7px">';

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			
			$str = $str."<strong style='color:#990000; text-transform:uppercase'><u>".$row["projectname"].'</u></strong><br /><br />';
			$str = $str.'<strong><em>District :&nbsp;</strong></em> '.$row["district"].'<br /><br />';
			$str = $str.'<strong><em>Club :&nbsp;</strong></em> '.$row["club"].'<br /><br />';
			$str = $str.'<strong><em>Project Date :&nbsp;</strong></em> '.$row["submitdt"].'<br />';
			$str = $str.'<strong><em>Project Detail :&nbsp;</strong></em> '.$row["projectdesc"].'<br />';
			$str = $str.'<strong><em>Project needed no of person :&nbsp;</strong></em> '.$row["noofpersonneeded"].'<br />';
		}
	}
}
$str = $str.'</div>';

	echo $str;	
//echo json_encode($str);
?>
