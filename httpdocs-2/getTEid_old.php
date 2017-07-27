<?php
include("connection.php");
$schoolid = $_POST["schoolid"];

$teacherNo = $_POST["teacherNo"];
$userid = $_POST["userid"];

$arr = array();

$query = "SELECT id,teacherNo, teachername,gender,if(markunderstandsubject=0,'',markunderstandsubject) as markunderstandsubject, if(markanswerurqst=0,'',markanswerurqst) as markanswerurqst, if(markhelpafterschool=0,'',markhelpafterschool) as markhelpafterschool, if(markencourgetoplay=0,'',markencourgetoplay) as markencourgetoplay, if(markteachmethod=0,'',markteachmethod) as markteachmethod, if(markattendance=0,'',markattendance) as markattendance,  if(marksubjectknow=0,'',marksubjectknow) as marksubjectknow,if(markcommunication=0,'',markcommunication) as markcommunication, if(markinnovativemethod=0,'',markinnovativemethod) as markinnovativemethod, if(markunderstandstudentneed=0,'',markunderstandstudentneed) as markunderstandstudentneed, if(markmotivateability=0,'',markmotivateability) as markmotivateability, if(markhelping=0,'',markhelping) as markhelping, totalmarks,rank FROM teacherevaluationmarks WHERE schoolid=".$schoolid." and teacherNo='".$teacherNo."' and userid=".$userid.";";

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
