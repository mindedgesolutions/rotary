<?php
session_start();
ob_start();
include('include/config.php');

//$q = intval($_GET['q']);
$q = $_GET['q'];
//echo $q;
/*if($q=='Rotaract')
{
	$sql="SELECT distinct(district) FROM districtclub_rotaract WHERE category = '".$q."'";
	$result = mysql_query($sql);
	echo '<option value="">Select District</option>';
	while($row = mysql_fetch_array($result)) {
	 extract($row);	 
	 echo '<option value="'.$district.'">'.$district.'</option>';
	}
}*/
if($q=='Other')
{
	echo '<option value="">Select District</option>';
	echo '<option value="-1">Other</option>';
}
else
{
	$sql="SELECT distinct(district_code) FROM all_district WHERE status = '".$q."'";
	$result = mysql_query($sql);
	echo '<option value="">Select District</option>';
	while($row = mysql_fetch_array($result)) {
	 extract($row);	 
	 echo '<option value="'.$district_code.'">'.$district_code.'</option>';
	}
}


?>