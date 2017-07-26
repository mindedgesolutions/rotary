<?php
include("../connection.php");

$arr = array();

$refappno =$_POST["refappno"];

$query = "SELECT if(approvebyCP='','No',approvebyCP) as approvebyCP, if(approvebyPCP='','No',approvebyPCP) as approvebyPCP, if(approvebyDLCC='','No',approvebyDLCC) as approvebyDLCC, if(approvebyDG='','No',approvebyDG) as approvebyDG, if(approvebyRILMCEO='','No',approvebyRILMCEO) as approvebyRILMCEO ,if(approvebyRILMCP='','No',approvebyRILMCP) as approvebyRILMCP,`approvedtCP`, `approvedtPCP`, `approvedtDLCC`, `approvedtDG`, `approvedtRILMCEO`, `approvedtRILMCP`  FROM `grantAppEligible` where refappno ='".$refappno."';";

$result = mysqli_query($link,$query);
$str = $str.'<div style="width:800px; font-family:Arial, Helvetica, sans-serif; color:#333333; text-align:justify; padding:5px 7px">';

if($result)
{
	if(mysqli_affected_rows($link)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			
			$str = $str."<strong style='color:#990000; text-transform:uppercase'><u>".$refappno.'</u></strong><br /><br />';
			if($row["approvebyPCP"]=='Yes')
			$str = $str.'<strong><em>Approved by Primary Contact :&nbsp;</strong></em> '.$row["approvebyPCP"].' On '.$row["approvedtPCP"].'<br /><br />';
			else
			$str = $str.'<strong><em>Approved by Primary Contact :&nbsp;</strong></em> '.$row["approvebyPCP"].'<br /><br />';
			
			if($row["approvebyCP"]=='Yes')
			$str = $str.'<strong><em>Approved by Club President :&nbsp;</strong></em> '.$row["approvebyCP"].' On '.$row["approvedtCP"].'<br /><br />';
			else
			$str = $str.'<strong><em>Approved by Club President :&nbsp;</strong></em> '.$row["approvebyCP"].'<br /><br />';
			
			if($row["approvebyDLCC"]=='Yes')
			$str = $str.'<strong><em>Approved by DLCC :&nbsp;</strong></em> '.$row["approvebyDLCC"].' On '.$row["approvedtDLCC"].'<br /><br />';
			else
			$str = $str.'<strong><em>Approved by DLCC :&nbsp;</strong></em> '.$row["approvebyDLCC"].'<br /><br />';
			
			if($row["approvebyDG"]=='Yes')
			$str = $str.'<strong><em>Approved by DG :&nbsp;</strong></em> '.$row["approvebyDG"].' On '.$row["approvedtDG"].'<br /><br />';
			else
			$str = $str.'<strong><em>Approved by DG :&nbsp;</strong></em> '.$row["approvebyDG"].'<br /><br />';
			
			if($row["approvebyRILMCEO"]=='Yes')
			$str = $str.'<strong><em>Approved by RILM CEO:&nbsp;</strong></em> '.$row["approvebyRILMCEO"].' On '.$row["approvedtRILMCEO"].'<br /><br />';
			else
			$str = $str.'<strong><em>Approved by RILM CEO:&nbsp;</strong></em> '.$row["approvebyRILMCEO"].'<br /><br />';
			if($row["approvebyRILMCP"]=='Yes')
			$str = $str.'<strong><em>Approved by RILM Chairman:&nbsp;</strong></em> '.$row["approvebyRILMCP"].' On '.$row["approvedtRILMCP"].'<br /><br />';
			else
			$str = $str.'<strong><em>Approved by RILM Chairman:&nbsp;</strong></em> '.$row["approvebyRILMCP"].'<br /><br />';
		}
	}
}
$str = $str.'</div>';

	echo $str;	
?>
