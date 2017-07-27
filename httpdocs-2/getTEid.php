<?php
include("connection.php");
$schoolid = $_POST["schoolid"];

$teacherNo = $_POST["teacherNo"];
$userid = $_POST["userid"];

$arr = array();

$query = "SELECT id,teacherNo, teachername,gender,if(totalmarksbystudent=0,'',totalmarksbystudent) as totalmarksbystudent,if(totalmarksbyprinciple=0,'',totalmarksbyprinciple) as totalmarksbyprinciple,getaward,aboutteacher,teacherimage,if(noofstudent=0,'', noofstudent) as noofstudent,totalmarks,rank FROM teacherevaluationmarks WHERE schoolid=".$schoolid." and teacherNo='".$teacherNo."' and userid=".$userid.";";

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
